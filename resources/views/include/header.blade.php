	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="{{route('home')}}">Findstate</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="{{route('home')}}" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="about.html" class="nav-link">Properties</a></li>
	          <li class="nav-item"><a href="services.html" class="nav-link">Services</a></li>
	          <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
	          <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
			  @if (Route::has('login'))
                    @auth
					<li class="nav-item"><a href="{{ route('logout') }}" class="nav-link">Logout</a></li>
                    @else
						<li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                        @if (Route::has('registration'))
							<i class="nav-item"><a href="{{ route('registration') }}" class="nav-link">Registration</a></li>
                        @endif
                    @endauth
				</div>
			  @endif
	        </ul>
	      </div>
	    </div>
	</nav>