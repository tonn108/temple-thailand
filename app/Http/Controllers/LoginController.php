<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function register(Request $request) {
        
        $validated = $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
        ]);
        try {
            $user = User::create([
                'username' => $validated['username'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
            ]);

            Auth::login($user);

            return redirect()->route('index')
                ->with('success', 'ลงทะเบียนสำเร็จ! ยินดีต้อนรับเข้าสู่ระบบ');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'เกิดข้อผิดพลาดในการลงทะเบียน กรุณาลองใหม่อีกครั้ง');
        }
    }

    public function login(Request $request) {
        try {
            // ตรวจสอบความถูกต้องของข้อมูล
            $credentials = $request->validate([
                'username' => 'required|string',
                'password' => 'required|string',
            ]);

            // ตรวจสอบการล็อกอิน พร้อมตัวเลือก 'remember me'
            if (Auth::attempt($credentials, $request->filled('remember'))) {
                // ป้องกัน Session Fixation
                $request->session()->regenerate();
                
                // ล้างการนับจำนวนครั้งที่ล็อกอินผิดพลาด (ถ้ามี)
                if ($request->session()->has('login_attempts')) {
                    $request->session()->forget('login_attempts');
                }

                // ส่งกลับไปยังหน้าที่ต้องการ หรือหน้าหลัก
                return redirect()->intended(route('index'))
                    ->with('success', 'เข้าสู่ระบบสำเร็จ');
            }

            // เพิ่มการนับจำนวนครั้งที่ล็อกอินผิดพลาด
            $attempts = $request->session()->get('login_attempts', 0) + 1;
            $request->session()->put('login_attempts', $attempts);

            // ถ้าล็อกอินผิดพลาดเกิน 5 ครั้ง
            if ($attempts >= 5) {
                return back()
                    ->with('error', 'คุณได้พยายามเข้าสู่ระบบหลายครั้งเกินไป กรุณารอสักครู่แล้วลองใหม่อีกครั้ง')
                    ->withInput($request->except('password'));
            }

            return back()
                ->with('error', 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง')
                ->withInput($request->except('password'));

        } catch (\Exception $e) {
            return back()
                ->with('error', 'เกิดข้อผิดพลาดในการเข้าสู่ระบบ กรุณาลองใหม่อีกครั้ง')
                ->withInput($request->except('password'));
        }
    }
}