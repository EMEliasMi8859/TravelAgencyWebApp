

<header id="header" class="fixed-top ">
  <div class="container d-flex align-items-center ">
    <h1 class="logo me-auto"><a href="/"><span>High Dreams</span></a></h1>
    
    <nav id="navbar" class="navbar order-last order-lg-0 app-nav">
      <ul class="app-nav">
        <li><a href="/" class="{{ (request()->is('/')|request()->is('/home')) ? 'active' : '' }}">Home</a></li>

        <li><a href="/dashboard" class="{{ Route::is('dashboard') ? 'active' : '' }}">Dashboard</a></li>

        <li><a href="/RegisterCustomer" class="{{ Route::is('RegisterCustomer') ? 'active' : '' }}">Customers</a></li>

        <li><a href="/Contact" class="{{ Route::is('contact') ? 'active' : '' }}">Contact</a></li>

        <li class="dropdown m-0 p-0">
          <a class="app-nav__item dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-user fa-xl"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profileDropdown">
            <a class="dropdown-item d-flex text-left m-0" href="{{ route('profile.show') }}">
              <i class="fa fa-user fa-xl"><span class="ml-1"> Profile</span></i>
              
            </a>
              {{-- <a class="dropdown-item" href="{{ route('profile.show') }}">
                  <i class="fa fa-user mx-0 px-0"></i>Profile
              </a> --}}
              <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button type="submit" class="dropdown-item">
                      <i class="fa fa-sign-out fa-lg"></i> {{ __('Log Out') }}
                  </button>
              </form>
          </div>
      </li>
{{-- 
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown"
              aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-left ">

                <li><a class="dropdown-item" href="{{ route('profile.show') }}"><i class="fa fa-user fa-lg fa-2x"></i>
                        Profile</a>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-jet-responsive-nav-link class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            <i class="fa fa-sign-out fa-lg"></i> {{ __('Log Out') }}
                        </x-jet-responsive-nav-link>
                    </form>
                </li>
            </ul>
        </li> --}}
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

    {{-- <div class="header-social-links d-flex">
      <a href="#" class="twitter"><i class="bu bi-twitter"></i></a>
      <a href="#" class="facebook"><i class="bu bi-facebook"></i></a>
      <a href="#" class="instagram"><i class="bu bi-instagram"></i></a>
      <a href="#" class="linkedin"><i class="bu bi-linkedin"></i></i></a>
    </div> --}}

  </div>
</header>