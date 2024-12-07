@section('css')
<link href="{{ asset('css/create.css') }}" rel="stylesheet">
@endsection
@extends('layout.app')
@section('title', 'เพิ่มข้อมูลวัดใหม่')
@section('sidebar')
    @include('component.sidebar.sidebar')
@endsection
@section('content')
<div class="container" style="margin-top: 20px; margin-left: 20px;">
    <h1>Insert</h1>
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('temples.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group">
                    <label for="name">ชื่อวัด</label>
                    <input type="text" name="temple_name" class="form-control" id="temple_name" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="name">ที่อยู่</label>
                    <input type="text" name="location" class="form-control" id="location" placeholder="location">
                </div>
                <div class="form-group">
                    <label for="name">รายละเอียด</label>
                    <input type="text" name="description" class="form-control" id="description" placeholder="description">
                </div>
                <div class="form-group">
                    <label for="image">รูปภาพ</label>
                    <input type="file" name="image" class="form-control" accept="image/*">
                </div>
                <div class="form-group">
                    <label for="name">ภูมิภาค</label>
                    <select name="sector" class="form-control">
                        <option value="วัดภาคเหนือ">วัดภาคเหนือ</option>
                        <option value="วัดภาคตะวันออก">วัดภาคตะวันออก</option>
                        <option value="วัดภาคกลาง">วัดภาคกลาง</option>
                        <option value="วัดภาคใต้">วัดภาคใต้</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">ความนิยม</label>
                    <select name="popular" class="form-control">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-secondary" onclick="window.location.href='{{ route('index') }}'">Back</button>
            </form>
        </div>
    </div>
</div>
@endsection
