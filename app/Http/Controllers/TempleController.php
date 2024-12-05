<?php

namespace App\Http\Controllers;

use App\Models\Temple;
use Illuminate\Http\Request;

class TempleController extends Controller {
    public function index() {
        $temples = Temple::all();
        return view('welcome', compact('temples'));
    }
    
    public function search(Request $request) {
        $search = $request->search; 
            // ถ้าไม่มีคำค้นหา ให้แสดงข้อมูลทั้งหมด
    if (empty($search)) {
        $temples = Temple::all();
        return view('searchview', compact('temples', 'search'));
    }
        // เมือมีคำค้นหา จะค้นหาข้อมูล
        $temples = Temple::where('temple_name', 'LIKE', "%{$search}%")
                        ->orWhere('location', 'LIKE', "%{$search}%")
                        ->orWhere('description', 'LIKE', "%{$search}%")
                        ->orWhere('sector', 'LIKE', "%{$search}%")
                        ->get();

        // ถ้าไม่มีข้อมูลที่ค้นหา แสดงข้อความแจ้งเตือน
        if ($temples->isEmpty()) {
            return redirect()->back()->with('error', 'ไม่พบข้อมูลที่ค้นหา');
        }
        
        // ส่งผลลัพธ์ไปยัง view
        return view('searchview', compact('temples', 'search'));
    }

    public function store(Request $request) {
        
        $request->validate([
            'temple_name' => 'required',
            'location' => 'required',
            'description' => 'required',
            'popular' => 'required|numeric|min:1|max:5',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sector' => 'required'
        ]);

        try {
            if (!$request->hasFile('image')) {
                return redirect()->back()
                    ->with('error', 'กรุณาอัพโหลดรูปภาพ')
                    ->withInput();
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('img'), $imageName);

            Temple::create([
                'temple_name' => $request->temple_name,
                'location' => $request->location,
                'description' => $request->description,
                'popular' => $request->popular,
                'image' => 'img/' . $imageName,
                'sector' => $request->sector
            ]);
            return redirect()->route('index')
                ->with('success', 'เพิ่มข้อมูลวัดเรียบร้อยแล้ว');

        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()
                ->with('error', 'เกิดข้อผิดพลาด: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function create() {
        return view('create');
    }

    public function edit($id) {
        $temple = Temple::findOrFail($id);
        return view('edit', compact('temple'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'temple_name' => 'required',
            'location' => 'required',
            'description' => 'required',
            'sector' => 'required',
            'popular' => 'required|numeric|min:1|max:5',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $temple = Temple::findOrFail($id);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('img'), $imageName);
            $data['image'] = 'img/' . $imageName;
        }

        $temple->update($data);

        return redirect()->route('index')->with('success', 'อัพเดทข้อมูลสำเร็จ');
    }

    public function destroy($id) {
        $temple = Temple::find($id);
        $temple->delete();
        return redirect()->route('index');
    }

    public function show($id) {
        $temple = Temple::find($id);
        if (!$temple) {
            return redirect()->route('temple.index')->with('error', 'ไม่พบข้อมูลวัดที่ต้องการ');
        }
        return view('show', compact('temple'));
    }

    public function alltemples() {
        $northTemples = Temple::where('sector', 'ภาคเหนือ')->get();
        $eastTemples = Temple::where('sector', 'ภาคตะวันออก')->get();
        $centralTemples = Temple::where('sector', 'ภาคกลาง')->get();
        $southTemples = Temple::where('sector', 'ภาคใต้')->get();

        return view('alltemples', compact('northTemples', 'eastTemples', 'centralTemples', 'southTemples'));
    }
}
