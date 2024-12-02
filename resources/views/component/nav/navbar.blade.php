<nav class="bg-white shadow">
    <div class="container" id="navbar" style="padding:0; max-width:100%">
        <div class="row">
            <div class="col-md-1">
                <div class="logo">
                    <img src="{{ asset('img/wat7.jpg') }}" class="rounded-circle" alt="logo" style="width: 55px; height: 55px; border-radius: 10px;">
                </div>    
            </div>
            <div class="col-md-3">
                <div class="menu">
                    <div class="home">
                        <div class="home-btn">
                            <a class="btn-home " aria-current="page" href="{{ route('index') }}">หน้าแรก</a>
                        </div>
                    </div>
                    <div class="about">
                        <div class="about-btn">
                            <a class="btn-about " aria-current="page" href="{{ route('temples.alltemples') }}">วัดทั้งหมด</a>
                        </div>
                    </div>
                    <div class="insert">
                        <div class="insert-btn">
                            <a class="btn-insert " aria-current="page" href="{{ route('temples.create') }}">เพิ่มข้อมูลวัด</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="search">
                    <form action="{{ route('search') }}" method="get">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search">
                            <button class="btn btn-primary">Search</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-1">
                <div class="user">
                    <img src="{{ asset('img/wat7.jpg') }}" class="rounded-circle" alt="logo" style="width: 30px; height: 30px; border-radius: 10px;">
                </div>
            </div>
        </div>
    </div>
</nav>