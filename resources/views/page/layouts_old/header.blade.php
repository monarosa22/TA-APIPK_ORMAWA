<nav class="navbar navbar-default navbar-fixed-top">
	<div class="brand">
		<a href="index.html">
			<img src="{{ url('') }}/assets/img/logo-dark.png" alt="Klorofil Logo" class="img-responsive logo">
		</a>
	</div>
	<div class="container-fluid">
		<div class="navbar-btn">
			<button type="button" class="btn-toggle-fullwidth">
				<i class="lnr lnr-arrow-left-circle"></i>
			</button>
		</div>
		<div class="navbar-btn navbar-btn-right">
			<a class="btn btn-success update-pro" href="{{ url('/logout')}}">
				<span>LOGOUT</span>
			</a>
		</div>
		<div id="navbar-menu">
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<img src="{{ url('') }}/assets/img/user.png" class="img-circle" alt="Avatar">
						<span>Samuel</span>
						<i class="icon-submenu lnr lnr-chevron-down"></i>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a href="#">
								<i class="lnr lnr-user"></i>
								<span>My Profile</span>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="lnr lnr-envelope"></i>
								<span>Message</span>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="lnr lnr-cog"></i>
								<span>Settings</span>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="lnr lnr-exit"></i>
								<span>Logout</span>
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>
