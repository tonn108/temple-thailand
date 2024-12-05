@extends('layout.app')
@section('content')
    <div class="container">
        <h1>แก้ไขยูสเซอร์</h1>
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('user.update', $user->id) }}" method="post">
                    @csrf
            @method('PUT')
            <div class="form-group">
                <label for="username">ชื่อผู้ใช้</label>
                <input type="text" name="username" class="form-control" value="{{ $user->username }}">
            </div>
            <div class="form-group">
                <label for="password">รหัสผ่าน</label>
                <input type="text" name="password" class="form-control" value="{{ $user->password }}">
            </div>
            <div class="form-group">
                <label for="first_name">ชื่อ</label>
                <input type="text" name="first_name" class="form-control" value="{{ $user->first_name }}">
            </div>
            <div class="form-group">
                <label for="last_name">นามสกุล</label>
                <input type="text" name="last_name" class="form-control" value="{{ $user->last_name }}">
            </div>
            <div class="form-group">
                <label for="email">อีเมล</label>
                <input type="text" name="email" class="form-control" value="{{ $user->email }}">
            </div>
            <div class="form-group">
                    <label for="role">สิทธิ์</label>
                    <select name="role" class="form-control">
                        <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>ผู้ใช้ทั่วไป</option>
                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>ผู้ดูแลระบบ</option>
                        <option value="manager" {{ $user->role == 'manager' ? 'selected' : '' }}>ผู้ดูแลระบบสูงสุด</option>
                    </select>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">บันทึก</button>
                <a class="btn btn-secondary" href="{{ route('user.detail') }}">ยกเลิก</a>
                </form>
            </div>
        </div>
    </div>
@endsection