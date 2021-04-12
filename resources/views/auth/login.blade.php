<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Vegan Store Management | Login</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{asset('admin_2/assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin_2/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin_2/assets/vendor/linearicons/style.css')}}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{asset('admin_2/assets/css/main.css')}}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="{{asset('admin_2/assets/css/demo.css')}}">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('admin_2/assets/img/apple-icon.png')}}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{asset('admin_2/assets/images/vegan_store_logo.png')}}">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
								<div class="logo text-center"><img src="{{asset('admin_2/assets/images/logo.png')}}" width="150" alt="Vegan Store Logo"></div>
                                <p class="lead">Masuk sebagai Manajemen Vegastore</p>
							</div>

                            <form class="form-auth-small" action="/postlogin" method="POST" >
                                @csrf

								@if (session('login_error'))
								<div class="col-md-12">
									<div class="alert alert-danger" role="alert">
										<span> Email atau Password Anda Salah </span>
									</div>
								</div>
								@endif

								<div class="form-group">
									<label for="signin-email" class="control-label sr-only">Email</label>
									<input name ="email" type="email" class="form-control" id="signin-email" placeholder="Email">
								</div>
								<div class="form-group">
									<label for="signin-password" class="control-label sr-only">Password</label>
									<input name ="password" type="password" class="form-control" id="signin-password" placeholder="Password">
                                		</div>
								
								@foreach($errors->all() as $error)
						  			<li>{{ $error }}</li>
					   			@endforeach

                                
								<!-- <div class="form-group clearfix">
									<label class="fancy-checkbox element-left">
										<input type="checkbox">
										<span>Remember me</span>
									</label>
								</div> -->
								<button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
								<div class="bottom">
									<span class="helper-text"><i class="fa "></i> <a href="/registrasi">Registrasi Akun Baru</a></span>
								</div>
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading"><b>Manajemen Veganstore</b></h1>
							<p><b>Silahkan Masuk</b></p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>
