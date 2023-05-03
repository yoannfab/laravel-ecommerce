<header class="header_section">
            <div class="container-fluid" style="max-width:1600px">
               <nav class="navbar navbar-expand-lg custom_nav-container ">
                  <a class="navbar-brand" href="{{url('/')}}"><img style="max-height:80px" src="{{asset('images/logo.png')}}" alt="#" /></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                        <li class="nav-item ">
                           <a class="nav-link" href="{{url('/')}}">Home  </a>
                        </li>
                       
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('products')}}">Products </a>
                        </li>
                       
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('contact')}}">Contact</a>
                        </li>

                       


                        @if (Route::has('login'))

                        @auth

                        <li class="nav-item">
                           <a class="nav-link" href="{{url('show_cart')}}">
                              <span style="position:relative;">   
                                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                                 </svg>
                                 <span class="badge badge-pill badge-danger" style="position:absolute;top:-10px;right:-10px;">{{$cart_count}}</span>
                              </span>
                              </a>
                        </li>

                        @else

                         <li class="nav-item">
                           <a class="nav-link" href="{{url('show_cart')}}">
                              <span style="position:relative;">   
                                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                                 </svg>
                              <span class="badge badge-pill badge-secondary" style="position:absolute;top:-10px;right:-10px;">0</span>
                              </span>
                           </a>
                        </li>

                       
                        @endauth

                        @endif


                           @auth

                        <li class="nav-item">
                           <a class="nav-link" href="{{url('show_order')}}">
                                 Orders 
                              </a>
                        </li>

                        @else

                         <li class="nav-item">
                           <a class="nav-link" href="{{url('show_order')}}">
                                 Orders 
                              </a>
                        </li>

                       
                        @endauth


                       

                        @if (Route::has('login'))

                        @auth

                       
                  <div class="dropdown">

                    <button class="btn btn-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     {{Auth::user()->name}}
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                     <a class="dropdown-item" style="font-weight:600" href="{{ route('profile.show') }}">
                     <span class="btn" style="font-weight:600">   {{ __('Profile') }} </span><a/>

                      <form class="dropdown-item"  method="POST" action="{{ route('logout') }}">
                          @csrf
                         
                              <a class="btn" href="{{ route('logout') }}" onclick="event.preventDefault();
                                          this.closest('form').submit(); " role="button">
                                  

                                  {{ __('Log Out') }}
                              </a>
                          
                      </form>

                       
                             
                             
                    </div>

                  </div>
                    
                     
                         
                        
                 
              </li>
            </ul>

                        @else

                        <li class="nav-item">
                           <a class="nav-link" id="logincss" href="{{ route('login') }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
  <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
</svg></a>
                        </li>

                        <!-- <li class="nav-item">
                           <a class="btn btn-success" href="{{ route('register') }}">Register</a>
                        </li> -->
                        @endauth

                        @endif
                        
                        
                     </ul>
                  </div>
               </nav>
            </div>
         </header>