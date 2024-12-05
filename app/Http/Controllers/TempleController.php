<?php

namespace App\Http\Controllers;

use App\Models\Temple;
use Illuminate\Http\Request;

class TempleController extends Controller {
    public function index() {
        
        return view('welcome');
    }

    public function mainContent(){
        $temples = Temple::all();
        return view('index', compact('temples'));
    }
    
    public function search(Request $request) {
        $search = $request->search; 
        
        // เคลียร์ session ทั้งหมดที่เกี่ยวข้องก่อน
        session()->forget(['error', 'success']);
        
        if (empty($search) || trim($search) === '') {
            $temples = Temple::all();
            session()->flash('success', 'แสดงข้อมูลทั้งหมด');
            return view('searchview', compact('temples', 'search'));
        }

        $temples = Temple::where('temple_name', 'LIKE', "%{$search}%")
                        ->orWhere('location', 'LIKE', "%{$search}%")
                        ->orWhere('description', 'LIKE', "%{$search}%")
                        ->orWhere('sector', 'LIKE', "%{$search}%")
                        ->get();

        if ($temples->isEmpty()) {
            session()->flash('error', 'ไม่พบข้อมูลที่ค้นหา');
            return view('searchview', compact('temples', 'search'));
        }
        
        session()->flash('success', 'ค้นหาข้อมูลสำเร็จ');
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
            session()->flash('success', 'เพิ่มข้อมูลวัดเรียบร้อยแล้ว');
            return redirect()->route('index');

        } catch (\Exception $e) {
            dd($e);
            session()->flash('error', 'เกิดข้อผิดพลาด: ' . $e->getMessage());
            return redirect()->back();
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
        session()->flash('success', 'อัพเดทข้อมูลสำเร็จ');
        return redirect()->route('index');
    }

    public function destroy($id) {
        $temple = Temple::find($id);
        $temple->delete();
        session()->flash('success', 'ลบข้อมูลสำเร็จ');
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
