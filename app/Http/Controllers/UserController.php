<?php


namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller{
    public function detail(){
        $users = User::all();
        return view('user.userDetail',compact('users'));
    }
    public function edit($id){
        $user = User::findOrFail($id);
        return view('user.userEdit',compact('user'));
    }
    public function search(Request $request){
        $search = $request->search;
        session()->forget(['error', 'success']);

        if(empty($search)){
            $users = User::all();
            session()->flash('success','แสดงข้อมูลทั้งหมด');
            return redirect()->route('user.detail');
        }else{
            $users = User::where('username','like','%'.$search.'%')
                    ->orWhere('first_name','like','%'.$search.'%')
                    ->orWhere('last_name','like','%'.$search.'%')
                    ->orWhere('email','like','%'.$search.'%')
                    ->orWhere('role','like','%'.$search.'%')
                    ->get();
        }
        if($users->isEmpty()){
            session()->flash('error','ไม่พบข้อมูลที่ค้นหา');
            return redirect()->route('user.detail');
        }
        session()->flash('success','ค้นหาข้อมูลสำเร็จ');
        session()->put('users', $users); 
        return view('user.userDetail',compact('users','search'));
    }
    public function update(Request $request, $id) {
        try {
            $validated = $request->validate([
                'username' => 'required|string|max:255|unique:users,username,'.$id,
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,'.$id,
                'role' => 'required|string|max:255',
            ]);

            $user = User::findOrFail($id);
            $user->update($validated);
            
            session()->flash('success', 'อัพเดทข้อมูลสำเร็จ');
            return redirect()->route('user.detail');

        } catch (\Illuminate\Validation\ValidationException $e) {
            session()->flash('error','ข้อมูลไม่ถูกต้อง');
            return redirect()->route('user.edit',compact('user'));
        }
    }
    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        session()->flash('success','ลบข้อมูลสำเร็จ');
        return redirect()->route('user.detail');
    }
}