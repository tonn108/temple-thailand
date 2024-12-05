@extends('layout.app')
@section('title', 'ข้อมูลวัดทั้งหมด')
@section('content')
    
    
    <!-- วัดภาคเหนือ -->
    <div class="temples-wrapper">
        <h1>วัดทั้งหมด</h1>
        <h2>วัดภาคเหนือ</h2>
        <div class="temples-scroll">
            @foreach($northTemples as $temple)
                <div class="temple-item">
                    <div class="temple-image">
                        <img src="{{ asset($temple->image) }}" alt="{{ $temple->temple_name }}">
                    </div>
                    <div class="temple-info">
                        <h3>{{ $temple->temple_name }}</h3>
                        <p>{{ $temple->location }}</p>
                        <a href="{{ route('temples.show', $temple->id) }}" class="view-button">ดูรายละเอียด</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- วัดภาคตะวันออก -->
    <div class="temples-wrapper">
        <h2>วัดภาคตะวันออก</h2>
        <div class="temples-scroll">
            @foreach($eastTemples as $temple)
                <div class="temple-item">
                    <div class="temple-image">
                        <img src="{{ asset($temple->image) }}" alt="{{ $temple->temple_name }}">
                    </div>
                    <div class="temple-info">
                        <h3>{{ $temple->temple_name }}</h3>
                        <p>{{ $temple->location }}</p>
                        <a href="{{ route('temples.show', $temple->id) }}" class="view-button">ดูรายละเอียด</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- วัดภาคกลาง -->
    <div class="temples-wrapper">
        <h2>วัดภาคกลาง</h2>
        <div class="temples-scroll">
            @foreach($centralTemples as $temple)
                <div class="temple-item">
                    <div class="temple-image">
                        <img src="{{ asset($temple->image) }}" alt="{{ $temple->temple_name }}">
                    </div>
                    <div class="temple-info">
                        <h3>{{ $temple->temple_name }}</h3>
                        <p>{{ $temple->location }}</p>
                        <a href="{{ route('temples.show', $temple->id) }}" class="view-button">ดูรายละเอียด</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- วัดภาคใต้ -->
    <div class="temples-wrapper">
        <h2>วัดภาคใต้</h2>
        <div class="temples-scroll">
            @foreach($southTemples as $temple)
                <div class="temple-item">
                    <div class="temple-image">
                        <img src="{{ asset($temple->image) }}" alt="{{ $temple->temple_name }}">
                    </div>
                    <div class="temple-info">
                        <h3>{{ $temple->temple_name }}</h3>
                        <p>{{ $temple->location }}</p>
                        <a href="{{ route('temples.show', $temple->id) }}" class="view-button">ดูรายละเอียด</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection