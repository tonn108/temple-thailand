    
    @extends('layout.app')
    @section('title', 'ข้อมูลวัดทั้งหมด')
    @section('content')
    <div class="container">
        <h1>ข้อมูลวัดทั้งหมด</h1>
        <div class="row"> 
            <div class="row mb-4">
                <h2>วัดภาคเหนือ</h2>
                <div class="d-flex overflow-auto">
                    @forelse ($northTemples as $temple)
                        <div class="col-md-4 mb-3 flex-shrink-0" style=" gap: 10px;">
                            <div class="card">
                                <img src="{{ asset($temple->image) }}" class="card-img-top" alt="{{ $temple->temple_name }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $temple->temple_name }}</h5>
                                    <p class="card-text">{{ $temple->location }}</p>
                                    <a href="{{ route('temples.show', $temple->id) }}" class="btn btn-primary">ดูรายละเอียด</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>ไม่พบข้อมูลวัดในภาคเหนือ</p>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="row"> 
            <div class="row mb-4">
                <h2>วัดภาคตะวันออก</h2>
                @forelse ($eastTemples as $temple)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <img src="{{ asset($temple->image) }}" class="card-img-top" alt="{{ $temple->temple_name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $temple->temple_name }}</h5>
                                <p class="card-text">{{ $temple->location }}</p>
                                <a href="{{ route('temples.show', $temple->id) }}" class="btn btn-primary">ดูรายละเอียด</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>ไม่พบข้อมูลวัดในภาคตะวันออก</p>
                @endforelse
            </div>
        </div>
        <div class="row"> 
            <div class="row mb-4">
                <h2>วัดภาคกลาง</h2>
                @forelse ($centralTemples as $temple)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <img src="{{ asset($temple->image) }}" class="card-img-top" alt="{{ $temple->temple_name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $temple->temple_name }}</h5>
                                <p class="card-text">{{ $temple->location }}</p>
                                <a href="{{ route('temples.show', $temple->id) }}" class="btn btn-primary">ดูรายละเอียด</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>ไม่พบข้อมูลวัดในภาคกลาง</p>
                @endforelse
            </div>
        </div>
        <div class="row"> 
            <div class="row mb-4">
                <h2>วัดภาคใต้</h2>
                @forelse ($southTemples as $temple)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <img src="{{ asset($temple->image) }}" class="card-img-top" alt="{{ $temple->temple_name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $temple->temple_name }}</h5>
                                <p class="card-text">{{ $temple->location }}</p>
                                <a href="{{ route('temples.show', $temple->id) }}" class="btn btn-primary">ดูรายละเอียด</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>ไม่พบข้อมูลวัดในภาคใต้</p>
                @endforelse
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        
    @endsection