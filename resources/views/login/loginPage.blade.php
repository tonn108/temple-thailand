<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="{{ asset('css/login.css') }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<script src="{{ asset('script/login.js') }}"></script>
	<title>ลงทะเบียนและเข้าสู่ระบบ</title>
</head>
<body>
	<div class="form-structor">
		@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
		<!-- ฟอร์ม Signup -->
		<form action="{{ route('login.register') }}" method="POST">
			@csrf
			<div class="signup">
				<h2 class="form-title" id="signup"><span>or</span>Sign up</h2>
				<div class="form-holder">
					<input type="text" name="username" class="input" placeholder="ชื่อผู้ใช้" />
					<div style="position: relative;">
						<input type="password" name="password" class="input" placeholder="รหัสผ่านอย่างน้อย 6 ตัว" id="password"/>
						<i class="fas fa-eye" onclick="togglePassword('password')" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;"></i>
					</div>
					<input type="text" name="first_name" class="input" placeholder="ชื่อ" />
					<input type="text" name="last_name" class="input" placeholder="นามสกุล" />
					<input type="email" name="email" class="input" placeholder="อีเมล" />
				</div>
				<button type="submit" class="submit-btn">สมัครสมาชิก</button>
			</div>
		</form>

		<!-- ฟอร์ม Login -->
		<form action="{{ route('login') }}" method="POST">
			@csrf
			<div class="login slide-up">
				<div class="center">
					<h2 class="form-title" id="login"><span>or</span>Log in</h2>
					<div class="form-holder">
						<input type="text" name="username" class="input" placeholder="ชื่อผู้ใช้" />
						<div style="position: relative;">
							<input type="password" name="password" class="input" placeholder="รหัสผ่านอย่างน้อย 6 ตัว" id="password"/>
							<i class="fas fa-eye" onclick="togglePassword('password')" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;"></i>
						</div>
					</div>
					<button type="submit" class="submit-btn">เข้าสู่ระบบ</button>
					<div>
						<input type="checkbox" name="remember" id="remember">
						<label for="remember">จำรหัสผ่าน</label>
					</div>
				</div>
			</div>
		</form>
	</div>
</body>
</html>