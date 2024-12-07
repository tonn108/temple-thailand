<nav class="bg-white shadow" id="Nav">
    <div class="container" id="navbar" style="padding:0; max-width:100%">
        <div class="row">
            <div class="col-md-1">
                <div class="ham">
                    <button class="sidebar-toggle">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
            <div class="col-md-1">
                <div class="logo">
                    <img src="{{ asset('img/wat7.jpg') }}" class="rounded-circle" alt="logo" style="width: 40px; height: 40px; border-radius: 10px;">
                </div>    
            </div>
            <div class="col-md-1">
                <div class="menu">
                    <div class="home">
                        <div class="home-btn">
                            <a class="btn-home  btn-sm" aria-current="page" href="{{ route('index') }}"><i class="fa-solid fa-house"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
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
            <div class="col-md-2" >
                <div class="user">
                    <div class="name">
                        <label>{{ Auth::user()->username }}</label>
                    </div>
                    <div class="img">
                        <img src="{{ asset('img/wat7.jpg') }}" class="rounded-circle" alt="logo" style="width: 30px; height: 30px; border-radius: 10px;">
                    </div>
                    <div class="logout">
                    @if (Auth::check())
                    <form action="{{ route('logout') }}" method="post"> 
                        @csrf
                        <button class="btn btn-primary" type="submit">logout</button>
                    </form>
                    @endif
                    </div>
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