<header class="default-header">
      <nav class="navbar navbar-expand-lg navbar-light">
          <div class="container px-3">
            <a class="navbar-brand" href="index.html">
              <img src="img/logo.png" alt="">
            </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="lnr lnr-menu"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent" >
                  <ul class="navbar-nav scrollable-menu">
                      <li><a href="/">Home</a></li>
                      <li><a href="{{ route('posts') }}">Posts</a></li>
                      <li><a href="{{ route('categories') }}">Categories</a></li>
                      <li><a href="#about">About</a></li>

             @if (Route::has('login'))
                    @auth
                    
                    
                    
                        
                          <li class="dropdown">
                              <a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                  <i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;

                              </a>
                              <div class="dropdown-menu menu1">
                                  @if(Auth::user()->role->id == 1)
                                        <a class="dropdown-item" href="{{ route('admin.profile') }}"><i class="fa fa-user" aria-hidden="true"></i>&nbsp; {{ Auth::user()->name }}</a>
                                        <a class="dropdown-item" href="{{ route('admin.dashboard') }}"><i class="fa fa-tv" aria-hidden="true"></i>&nbsp; Dashboard</a>
                                    @elseif (Auth::user()->role->id == 2)
                                        {{-- <a href="{{ route('user.dashboard') }}">User Dashboard</a> --}}
                                        <a class="dropdown-item" href=""><i class="fa fa-user" aria-hidden="true"></i>&nbsp; {{ Auth::user()->name }}</a>
                                        <a class="dropdown-item" href="{{ route('user.dashboard') }}"><i class="fa fa-tv" aria-hidden="true"></i>&nbsp; Dashboard</a>
                                    @else 
                                    null
                                  @endif
                                
                                <a class="dropdown-item" href=""><i class="fa fa-heart" aria-hidden="true"></i>&nbsp; Favourite List</a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form> 
                              </div>
                          </li>
                            @else
                                 <li><a href="{{ route('login') }}">Login</a></li> 

                                  @if (Route::has('register'))
                                      <li><a href="{{ route('register') }}">Register</a></li>
                                  @endif
                              @endauth
                            
                            @endif
                  </ul>
                </div>
          </div>
      </nav>
  </header>