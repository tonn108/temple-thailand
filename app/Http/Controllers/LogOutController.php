<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogOutController extends Controller
{
    public function logout(Request $request)
    {
        Auth::logout();
    
        // ล้าง session ทั้งหมด
        $request->session()->invalidate();
    
        // สร้าง token ใหม่เพื่อป้องกัน session fixation
        $request->session()->regenerateToken();
    
        // ส่งกลับไปยังหน้าหลักพร้อมข้อความ
        session()->flash('success', 'ออกจากระบบสำเร็จ');
        return redirect()->route('temple.index');
            
    }
}
