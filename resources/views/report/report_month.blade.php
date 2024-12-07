@extends('layout.app')
@section('title', 'รายงานประจำเดือน')
@section('sidebar')
@include('component.sidebar.sidebar')
@endsection
@section('content')
<div class="container" style="margin-top: 20px; margin-left: 20px;">
    <div class="row">
        <div class="col-md-12">
            <div class="report">
                <h4>รายงานวัดประจำเดือน</h4>
                <!-- ส่วนค้นหาและกรองข้อมูล -->
                <div class="row mb-4">
                    <div class="col-sm-6">
                        <form action="{{ route('report.report_month') }}" method="GET">
                            <div class="input-group">
                                <input type="month" class="form-control" id="report_month" name="report_month" value="{{ request('report_month', now()->format('Y-m')) }}">
                                <button type="submit" class="btn btn-primary">ค้นหา</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- สรุปข้อมูลสำคัญ -->
                <div class="row mb-4">
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">วัดทั้งหมด</h5>
                                <h2 class="card-text">{{ $totalTemples ?? 0 }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">วัดภาคเหนือ</h5>
                                <h2 class="card-text" style="color: #FF6384;">{{ $northTemples ?? 0 }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">วัดภาคกลาง</h5>
                                <h2 class="card-text" style="color: #36A2EB;">{{ $centralTemples ?? 0 }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">วัดภาคกะวันออก</h5>
                                <h2 class="card-text" style="color: #FFCE56;">{{ $eastTemples ?? 0 }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">วัดภาคใต้</h5>
                                <h2 class="card-text" style="color: #4BC0C0;">{{ $southTemples ?? 0 }}</h2>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- กราฟแสดงข้อมูล -->
                <div class="row mb-4">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">สัดส่วนวัดแต่ละภาค</h5>
                                <canvas id="templeTypeChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        const templeTypeChart = new Chart(
            document.getElementById('templeTypeChart'),
            {
                type: 'pie',
                data: {
                    labels: ['วัดภาคเหนือ', 'วัดภาคกลาง', 'วัดภาคตะวันออก', 'วัดภาคใต้'],
                    datasets: [{
                        data: [{{ $northTemples }}, {{ $centralTemples }}, {{ $eastTemples }}, {{ $southTemples }}],
                        backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0']
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                    const value = context.raw;
                                    const percentage = ((value / total) * 100).toFixed(1);
                                    return `${context.label}: ${value} (${percentage}%)`;
                                }
                            }
                        }
                    }
                }
            }
        );
    </script>
@endsection
