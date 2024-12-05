<nav class="bg-white shadow">
    <div class="container" id="navbar" style="padding:0; max-width:100%">
        <div class="row">
            <div class="col-md-1">
                <div class="logo">
                    <img src="{{ asset('img/wat7.jpg') }}" class="rounded-circle" alt="logo" style="width: 55px; height: 55px; border-radius: 10px;">
                </div>    
            </div>
            <div class="col-md-4">
                <div class="menu">
                    <div class="home">
                        <div class="home-btn">
                            <a class="btn-home  btn-sm" aria-current="page" href="{{ route('index') }}">หน้าแรก</a>
                        </div>
                    </div>
                    <div class="about">
                        <div class="about-btn">
                            <a class="btn-about  btn-sm" aria-current="page" href="{{ route('temples.alltemples') }}">วัดทั้งหมด</a>
                        </div>
                    </div>
                    @if (Auth::check() && Auth::user()->role == 'manager' || Auth::user()->role == 'admin')
                    <div class="insert">
                        <div class="insert-btn">
                            <a class="btn-insert  btn-sm" aria-current="page" href="{{ route('temples.create') }}">เพิ่มข้อมูลวัด</a>
                        </div>
                    </div>
                    @endif
                    @if (Auth::check() && Auth::user()->role == 'manager')
                    <div class="manage">
                        <div class="manage-btn">
                            <a class="btn-manage  btn-sm" aria-current="page" href="{{ route('user.detail') }}">จัดการยูสเซอร์</a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                <div class="search">
                    <form action="{{ route('search') }}" method="get">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="search"  class="form-control" placeholder="Search">
                            <button class="btn btn-primary">Search</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-3">
                <div class="user">
                    @if (Auth::check())
                    <form action="{{ route('logout') }}" method="post"> 
                        @csrf
                        <button class="btn btn-primary" type="submit">logout</button>
                        <label>{{ Auth::user()->username }}</label>
                        <img src="{{ asset('img/wat7.jpg') }}" class="rounded-circle" alt="logo" style="width: 30px; height: 30px; border-radius: 10px;">
                    </form>
                    @else
                    @endif
                </div>
            </div>
        </div>
    </div>
</nav>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var searchForm = document.querySelector('form');
        if (searchForm) {
            searchForm.addEventListener('submit', function() {
                setTimeout(function() {
                    var searchInput = searchForm.querySelector('input[name="search"]');
                    if (searchInput) {
                        searchInput.value = '';
                    }
                }, 100);
            });
        }
    });
</script>