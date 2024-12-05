@extends('layout.app')
@section('content')
@if(session('error'))
<div class="toast-container position-fixed top-0 end-0 p-3">
    <div id="error-toast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-danger text-white">
            <strong class="me-auto">แจ้งเตือน</strong>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            {{ session('error') }}
        </div>
    </div>
</div>
@endif
@if(session('success'))
<div class="toast-container position-fixed top-0 end-0 p-3">
    <div id="success-toast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-success text-white">
            <strong class="me-auto">แจ้งเตือน</strong>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            {{ session('success') }}
        </div>
    </div>
</div>
@endif
<script>
document.addEventListener('DOMContentLoaded', function() {

    var errorToastElement = document.getElementById('error-toast');
    if (errorToastElement) {
        var errorToast = new bootstrap.Toast(errorToastElement, {
            delay: 3000
        });
        errorToast.show();
    }

    var successToastElement = document.getElementById('success-toast');
    if (successToastElement) {
        var successToast = new bootstrap.Toast(successToastElement, {
            delay: 3000
        });
        successToast.show();
    }
});
</script>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1>จัดการยูสเซอร์</h1>
            <form action="{{ route('user.search') }}" method="post">
        @csrf
        <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="ค้นหายูสเซอร์">
                    <button type="submit" class="btn btn-primary">ค้นหา</button>
                </div>
            </form>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ชื่อผู้ใช้</th>
                <th>รหัสผ่าน</th>
                <th>ชื่อ</th>
                <th>นามสกุล</th>
                <th>อีเมล</th>
                <th>สิทธิ์</th>
                <th>แก้ไข</th>
                <th>ลบ</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->password }}</td>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning">แก้ไข</a>
                    </td>
                    <td>
                        <form action="{{ route('user.destroy', $user->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">ลบ</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection