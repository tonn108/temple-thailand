<aside id="Sidebar">
    <div class="sidebar-header">
        <h3>วัดไทย</h3>
    </div>
    <div class="sidebar-menu">
        <ul>
            <li><a href="{{ route('index') }}"><i class="fa-solid fa-house"></i> หน้าแรก</a></li>
            <li><a href="{{ route('temples.alltemples') }}"><i class="fa-solid fa-synagogue"></i> วัดทั้งหมด</a></li>
            @if (Auth::check() && Auth::user()->role == 'manager' || Auth::user()->role == 'admin')
            <li><a href="{{ route('temples.create') }}"><i class="fa-solid fa-plus-circle"></i> เพิ่มวัด</a></li>
            @endif
            @if (Auth::check() && Auth::user()->role == 'manager')
            <li><a href="{{ route('user.detail') }}"><i class="fa-solid fa-users"></i> จัดการยูสเซอร์</a></li>
            @endif
            @if (Auth::check() && Auth::user()->role == 'manager')
            <li class="report">
                <a href="{{ route('report.report_day') }}"><i class="fa-solid fa-chart-line"></i> รายงานประจำวัน</a>
            </li>
            <li class="report">
                <a href="{{ route('report.report_month') }}"><i class="fa-solid fa-chart-line"></i> รายงานประจำเดือน</a>
            </li>
            @endif
            <li class="mode">
                <div class="sun-moon">
                    <i class='bx bx-sun icon sun'></i>
                    <i class='bx bx-moon icon moon'></i>
                </div>
                <span class="mode-text text">Dark mode</span>
                <div class="toggle-switch">
                    <span class="switch"></span>
                </div>
            </li>
        </ul>
    </div>
    <div class="sidebar-footer">
        <a href="{{ route('logout') }}"><i class="fa-solid fa-right-from-bracket"></i> ออกจากระบบ</a>
    </div>
</aside>

