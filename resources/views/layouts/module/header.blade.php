<header>
    <!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-dark bg-indigo">
        {{-- Brand --}}
		<div class="navbar-brand wmin-200">
			<a href="index.html" class="d-inline-block">
				<img src="{{ asset('global_assets/images/logo_light.png')}}" alt="">
			</a>
		</div>
        {{-- END Brand --}}

        {{-- Mobile Sidebar --}}
		<div class="d-md-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button>
			<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
				<i class="icon-paragraph-justify3"></i>
			</button>
		</div>
        {{-- END Mobile Sidebar --}}
        
        {{-- Content --}}
		<div class="collapse navbar-collapse" id="navbar-mobile">
			{{-- Dekstop Sidebar Toggle --}}
            <ul class="navbar-nav">
				<li class="nav-item">
					<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
						<i class="icon-paragraph-justify3"></i>
					</a>
				</li>
			</ul>
            {{-- END Dekstop Sidebar Toggle --}}

            {{-- Avatar Navbar --}}
			<ul class="navbar-nav ml-auto">
				<li class="nav-item dropdown dropdown-user">
					<a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
						<img src="{{ asset('admin/assets/img/avatars/6.jpg') }}" class="rounded-circle mr-2" height="34" alt="Admin Image">
						<span>{{ auth()->user()->name }}</span>
					</a>
					
					<div class="dropdown-menu dropdown-menu-right">
						<a href="#" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a>
						<a href="/logout" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
					</div>
				</li>
			</ul>
            {{-- END Avatar Navbar  --}}
		</div>
        {{-- END Content --}}
	</div>
	<!-- /main navbar -->
</header>

