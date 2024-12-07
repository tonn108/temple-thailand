@section('css')
<link href="{{ asset('css/edit.css') }}" rel="stylesheet">
@endsection
@extends('layout.app')
@section('title', 'แก้ไขข้อมูลวัด')
@section('sidebar')
    @include('component.sidebar.sidebar')
@endsection
@section('content')
    <div class="container" style="margin-top: 56px;">
        <h1>แก้ไขข้อมูลวัด</h1>
        <form action="{{ route('temples.update', $temple->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="temple_name">ชื่อวัด</label>
                <input type="text" name="temple_name" class="form-control" value="{{ $temple->temple_name }}">
            </div>
            <div class="form-group mb-3">
                <label for="location">ที่อยู่</label>
                <input type="text" name="location" class="form-control" value="{{ $temple->location }}">
            </div>
            <div class="form-group mb-3">
                <label for="description">รายละเอียด</label>
                <textarea name="description" class="form-control">{{ $temple->description }}</textarea>
            </div>
            <div class="form-group mb-3">
                <label for="image">รูปภาพ</label>
                <input type="file" name="image" class="form-control">
                <small class="text-muted">ปล่อยว่างไว้หากไม่ต้องการเปลี่ยนรูปภาพ</small>
            </div>
            <div class="form-group mb-3">
                <label for="sector">ภูมิภาค</label>
                <select name="sector" class="form-control">
                    <option value="ภาคเหนือ" {{ $temple->sector == 'ภาคเหนือ' ? 'selected' : '' }}>ภาคเหนือ</option>
                    <option value="ภาคตะวันออก" {{ $temple->sector == 'ภาคตะวันออก' ? 'selected' : '' }}>ภาคตะวันออก</option>
                    <option value="ภาคกลาง" {{ $temple->sector == 'ภาคกลาง' ? 'selected' : '' }}>ภาคกลาง</option>
                    <option value="ภาคใต้" {{ $temple->sector == 'ภาคใต้' ? 'selected' : '' }}>ภาคใต้</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="popular">ความนิยม</label>
                <select name="popular" class="form-control">
                    @for($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}" {{ $temple->popular == $i ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <button type="submit" class="btn btn-primary">บันทึก</button>
            <button type="button" class="btn btn-secondary" onclick="window.location.href='{{ route('temples.show', $temple->id) }}'">ยกเลิก</button>
        </form>
    </div>
@endsection
