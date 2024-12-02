@extends('layout.app')
@section('title', 'ค้นหาวัด')
@section('content')
    <h1>ผลลคพธ์การค้นหาวัด</h1>
    @if(isset($temples) && $temples->isEmpty())
        <p>ไม่พบข้อมูลวัดที่ต้องการ</p>
    @else
        @foreach($temples as $temple)
            <div class="col-md-4 mb-3 flex-shrink-0" style=" gap: 10px;">
                <div class="card-search">
                    <img src="{{ asset($temple->image) }}" class="card-img-top" alt="{{ $temple->temple_name }}">
                    <div class="card-search-body">
                        <h5 class="card-search-title">{{ $temple->temple_name }}</h5>
                        <p class="card-search-text">{{ $temple->location }}</p>
                        <a href="{{ route('temples.show', $temple->id) }}" class="btn btn-primary">ดูรายละเอียด</a>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
@endsection