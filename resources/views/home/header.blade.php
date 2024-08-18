
<base href="/public">

<div class="header_main">
            <div class="mobile_menu">
               <nav class="navbar navbar-expand-lg navbar-light bg-light">
                  <div class="logo_mobile"><a href="dashboard"><img src="images/logo.png"></a></div>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNav">
                     <ul class="navbar-nav">
                        <li class="nav-item">
                           <a class="nav-link" href="home.dashboard">Home</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="home.aboutpage">About</a>
                        </li>



                     </ul>
                  </div>
               </nav>
            </div>
            <div class="container-fluid">
               <div class="logo"><a href="index.html"><img src="images/logo.png"></a></div>
               <div class="menu_main">
                  <ul>
                     <li class="active"><a href="dashboard">Home</a></li>
                     <li><a href="goto_about">About</a></li>

                     @if(Route::has('login'))
                     @auth

                     <li><a href="{{url('add_post')}}">Create Post</a></li>


                     <li><a href="{{url('myposts_user')}}">My Posts</a></li>


                    <li>
                    <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
                    </li>


                    @else
                     <li><a href="{{route('login')}}">Login</a></li>
                     <li><a href="{{route('register')}}">Register</a></li>
                     @endauth
                     @endif
                  </ul>
               </div>
            </div>
         </div>
