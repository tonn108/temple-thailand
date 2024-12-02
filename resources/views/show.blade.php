@extends('layout.app')
@section('title', 'ข้อมูลวัด')
@section('content')
<div class="container">
    <h1>รายละเอียดวัด</h1>
    <div class="row">
        <div class="col-md-6">
            <div class="show-image">
                <img src="{{ asset($temple->image) }}" alt="{{ $temple->temple_name }}">
            </div>
            <div class="show-content">  
                @if($temple)
                    <h2>{{ $temple->temple_name }}</h2>
                <p>{{ $temple->location }}</p>
                <p>{{ $temple->description }}</p>
                <p>ความนิยม: 
                    @for($i = 1; $i <= 5; $i++)
                        @if($i <= $temple->popular)
                            <i class="fas fa-star text-warning"></i>
                        @else
                            <i class="far fa-star text-warning"></i>
                        @endif
                    @endfor
                    ({{ $temple->popular }}/5)
                </p>
                
                <div class="mt-3">
                    <button class="btn btn-warning" onclick="window.location.href='{{ route('temples.edit', $temple->id) }}'">แก้ไขข้อมูล</button> 
                    <form action="{{ route('temples.destroy', $temple->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('คุณแน่ใจหรือไม่ที่จะลบข้อมูลนี้?')">ลบข้อมูล</button>
                    </form>
                </div>
            @else
                <p>ไม่พบข้อมูลวัดที่ต้องการ</p>
            @endif
            </div> 
        </div>
    </div>
</div>
@endsection
