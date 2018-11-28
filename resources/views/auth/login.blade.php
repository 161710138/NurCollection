<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V9</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	

	<link rel="icon" type="image/png" href="{{ asset('assets/login/login2/images/icons/favicon.ico')}}"/>
<!--===============================================================================================-->

	<link rel="stylesheet" type="text/css" href="{{ asset('assets/login/login2/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/login/login2/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/login/login2/fonts/iconic/css/material-design-iconic-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/login/login2/vendor/animate/animate.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/login/login2/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/login/login2/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/login/login2/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/login/login2/vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/login/login2/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/login/login2/css/main.css')}}">
<!--===============================================================================================-->
</head>
<body>
	
	
	<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
			<form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                        @csrf>
				<span class="login100-form-title p-b-37">
					Sign In
				</span>

				<div class="wrap-input100 validate-input m-b-20{ $errors->has('email') ? ' is-invalid' : '' }}" data-validate="Enter username or email">
                    <input id="email" type="email" class="input100" name="email" placeholder="username or email" value="{{ old('email') }}" required autofocus>
                    <span class="focus-input100"></span>
                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
				</div>

				<div class="wrap-input100 validate-input m-b-25{{ $errors->has('password') ? ' is-invalid' : '' }}" data-validate = "Enter password">
                    <input id="password" type="password" class="input100" name="password" placeholder="password" required>
                    <span class="focus-input100"></span>
                    @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
				</div>

				<div class="container-login100-form-btn">
					<button class="login100-form-btn">
						Sign In
					</button>
				</div>

				<div class="text-center p-t-57 p-b-20">
					<span class="txt1">
						Or login with
					</span>
				</div>

				<div class="flex-c p-b-112">
					<a href="#" class="login100-social-item">
						<i class="fa fa-facebook-f"></i>
					</a>

					<a href="#" class="login100-social-item">
                    
						<img src="{{ asset('assets/login/login2/images/icons/icon-google.png')}}" alt="GOOGLE">
					</a>
				</div>

				<div class="text-center">
					<a href="{{ route('register') }}" class="txt2 hov1">
						Sign Up
					</a>
				</div>
			</form>

			
		</div>
	</div>
	
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->

	<script src="{{ asset('assets/login/login2/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assets/login/login2/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assets/login/login2/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{ asset('assets/login/login2/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assets/login/login2/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assets/login/login2/vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{ asset('assets/login/login2/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assets/login/login2/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assets/login/login2/js/main.js')}}"></script>

</body>
</html>
