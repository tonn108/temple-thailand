@extends('layout.app')
@section('title', 'ค้นหาวัด')
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
    <div class="container">
        <h1>ผลลัพธ์การค้นหาข้อมูลวัด</h1>
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

    </div>
@endsection
