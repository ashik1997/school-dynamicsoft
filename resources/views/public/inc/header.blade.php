<!--  preloader Start -->
<div id="preloader">
  <div id="status">
    <img src="{{asset('frontend/')}}/images/preloader.gif" id="preloader_image" alt="loader">
  </div>
</div>
<!--top header start-->
<div class="md_header_wrapper_2">
  <div class="top_header_section d-none d-sm-none d-md-block">
    <div class="container">
      <div class="row">
        <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12">
          <div class="top_header_add">
            <ul>
              <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="#"><span>Email :</span> {{ App\Models\SiteInfo::pluck('email')[0] }}</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12">
          <div class="right_side_main_warpper">
            <div class="md_right_side_warpper">
              <ul>
                <li>follow us :</li>
                @foreach(App\Models\SocialMedia::get() as $key => $social_media)
                <li><a href="{{$social_media->url}}" class="{{$social_media->name}}">{!!$social_media->icon!!}</a></li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="middle_header_wrapper_two">
    <div class="container">
      <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
          <div class="md_logo d-none d-sm-none d-md-none d-lg-block">
            @if (file_exists('frontend/images/logo/'.App\Models\SiteInfo::pluck('header_logo')[0]))
            <a href="/"><img src="{{asset('frontend/')}}/images/logo/{{ App\Models\SiteInfo::pluck('header_logo')[0] }}" alt=""></a>
            @endif
          </div>
        </div>
        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
          <div class="md_share_info_wrapper">
            <ul>
              <li>
                <div class="lv_header_icon">
                  <img src="{{asset('frontend/')}}/images/Icon_clock_1.png" alt="Icon" title="Icon">
                </div>
                <p><span>opening hours</span><br> 24 / 7 day & night</p>
              </li>
              <li>
                <div class="lv_header_icon">
                  <img src="{{asset('frontend/')}}/images/icon_cll_1.png" alt="Icon" title="Icon">
                </div>
                <p> <span>call us</span><br>{{ App\Models\SiteInfo::pluck('phone')[0] }}</p>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--top header end-->
<!--header menu wrapper-->
<div class="menu_wrapper_2 header-area hidden-menu-bar stick ">
  <div class="container">
    <div class="row">
      <div class="col-lg-9 col-md-9 col-sm-10 col-xs-12">
        <div class="kv_navigation_wrapper">
          <div class="et_navbar_search_wrapper d-none d-sm-none d-md-block d-lg-block ">
            <div class="et_search_bar" id="search_button">
              <a href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
            </div>
            <div id="search_open" class="et_search_box">
              <input type="text" placeholder="Search here">
              <button><i class="fa fa-search" aria-hidden="true"></i></button>
            </div>
          </div>
          <div class="mainmenu d-xl-block d-lg-block d-md-block d-sm-none d-none">
            <ul class="main_nav_ul">
              <li class="gc_main_navigation @if(Route::current()->getName() == 'home') active @endif"><a class="gc_main_navigation second_navigation hover_color" href="{{route('home')}}">Home</a></li>
              <li class="gc_main_navigation @if(Route::current()->getName() == 'about') active @endif"><a class="gc_main_navigation second_navigation hover_color" href="{{route('about')}}">About</a></li>
              <!-- <li class="gc_main_navigation @if(Route::current()->getName() == 'pricing') active @endif"><a class="gc_main_navigation second_navigation hover_color" href="{{route('pricing')}}">Pricing</a></li> -->
              <li class="gc_main_navigation @if(Route::current()->getName() == 'services') active @endif"><a class="gc_main_navigation second_navigation hover_color" href="{{route('services')}}">Depertments</a></li>
              <!-- <li class="gc_main_navigation @if(Route::current()->getName() == 'portfolio') active @endif"><a class="gc_main_navigation second_navigation hover_color" href="{{route('portfolio')}}">Portfolio</a></li> -->
              <li class="gc_main_navigation @if(Route::current()->getName() == 'team') active @endif"><a class="gc_main_navigation second_navigation hover_color" href="{{route('team')}}">Team</a></li>
              <li class="gc_main_navigation @if(Route::current()->getName() == 'gallery') active @endif"><a class="gc_main_navigation second_navigation hover_color" href="{{route('gallery')}}">Gallery</a></li>
              <li class="gc_main_navigation @if(Route::current()->getName() == 'blog') active @endif"><a class="gc_main_navigation second_navigation hover_color" href="{{route('blog')}}">Blog</a></li>
              <li class="gc_main_navigation @if(Route::current()->getName() == 'contact') active @endif"><a class="gc_main_navigation second_navigation hover_color" href="{{route('contact')}}">Contact</a></li>

                <!-- <li class="has-mega gc_main_navigation"><a href="#" class="gc_main_navigation  second_navigation hover_color"> Home&nbsp; </a>
                </li>
                <li class="has-mega gc_main_navigation"><a href="about_us.html" class="gc_main_navigation second_navigation hover_color">about us&nbsp; </a>
                </li>
                <li class="has-mega gc_main_navigation"><a href="services.html" class="gc_main_navigation second_navigation hover_color"> Depertments&nbsp; </a>

                </li>
                <li class="has-mega gc_main_navigation"><a href="our_doctors.html" class="gc_main_navigation second_navigation  hover_color"> doctors&nbsp;</a>
                </li>
                <li class="has-mega gc_main_navigation"><a href="contact_us.html" class="gc_main_navigation second_navigation hover_color"> contact&nbsp; </a>
                </li> -->

              @guest
                @if (Route::has('login'))
                <li class="has-mega gc_main_navigation">
                <a class="gc_main_navigation second_navigation hover_color" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @endif
                @else
                <li class="has-mega gc_main_navigation"><a href="#" class="gc_main_navigation  second_navigation hover_color"> {{ Auth::user()->name }} </a>
                  <ul>
                    <li class="parent"><a href="{{route('dashboard')}}">{{ __('Dashboard') }}</a></li>
                    <li class="parent"><a href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                      </a>
                    </li>
                  </ul>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                  </form>
                </li>
              @endguest

            </ul>
          </div>
          <!-- mainmenu end -->
        </div>
      </div>
      <div class="rp_mobail_menu_main_wrapper d-block d-sm-block d-md-none d-lg-none d-xl-none">
        <div class="row">
          <div class="col-xl-6">
            <div class="gc_logo logo_hidn d-block d-sm-block d-md-none d-lg-none d-xl-none">
              @if (file_exists('frontend/images/'.App\Models\SiteInfo::pluck('header_logo')[0]))
              <a href="/"><img src="{{asset('frontend/')}}/images/logo/{{ App\Models\SiteInfo::pluck('header_logo')[0] }}" class="img-responsive" alt="logo"></a>
              @else
              <h1><a href="/">{{ App\Models\SiteInfo::pluck('site_name')[0] }}</a></h1>
              @endif
            </div>
          </div>
          <div class="col-xl-6  d-block d-sm-block d-md-none d-lg-none d-xl-none">
              <div id="toggle">
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 31.177 31.177" style="enable-background:new 0 0 31.177 31.177;" xml:space="preserve" width="25px" height="25px">
                      <g>
                          <g>
                              <path class="menubar" d="M30.23,1.775H0.946c-0.489,0-0.887-0.398-0.887-0.888S0.457,0,0.946,0H30.23    c0.49,0,0.888,0.398,0.888,0.888S30.72,1.775,30.23,1.775z" fill="#2ec8a6" />
                          </g>
                          <g>
                              <path class="menubar" d="M30.23,9.126H12.069c-0.49,0-0.888-0.398-0.888-0.888c0-0.49,0.398-0.888,0.888-0.888H30.23    c0.49,0,0.888,0.397,0.888,0.888C31.118,8.729,30.72,9.126,30.23,9.126z" fill="#2ec8a6" />
                          </g>
                          <g>
                              <path class="menubar" d="M30.23,16.477H0.946c-0.489,0-0.887-0.398-0.887-0.888c0-0.49,0.398-0.888,0.887-0.888H30.23    c0.49,0,0.888,0.397,0.888,0.888C31.118,16.079,30.72,16.477,30.23,16.477z" fill="#2ec8a6" />
                          </g>
                          <g>
                              <path class="menubar" d="M30.23,23.826H12.069c-0.49,0-0.888-0.396-0.888-0.887c0-0.49,0.398-0.888,0.888-0.888H30.23    c0.49,0,0.888,0.397,0.888,0.888C31.118,23.43,30.72,23.826,30.23,23.826z" fill="#2ec8a6" />
                          </g>
                          <g>
                              <path class="menubar" d="M30.23,31.177H0.946c-0.489,0-0.887-0.396-0.887-0.887c0-0.49,0.398-0.888,0.887-0.888H30.23    c0.49,0,0.888,0.398,0.888,0.888C31.118,30.78,30.72,31.177,30.23,31.177z" fill="#2ec8a6" />
                          </g>
                      </g>
                  </svg>
              </div>
          </div>
        </div>
      </div>

      <div id="sidebar">
        <h1><span>{{ App\Models\SiteInfo::pluck('site_name')[0] }}</span></h1>
        <div id="toggle_close">&times;</div>
        <div id='cssmenu' class="wd_single_index_menu">
          <ul>
            <li class="@if(Route::current()->getName() == 'home') active @endif"><a href="{{route('home')}}">Home</a></li>
            <li class="@if(Route::current()->getName() == 'about') active @endif"><a href="{{route('about')}}">About</a></li>
            <li class="@if(Route::current()->getName() == 'pricing') active @endif"><a href="{{route('pricing')}}">Pricing</a></li>
            <li class="@if(Route::current()->getName() == 'services') active @endif"><a href="{{route('services')}}">Services</a></li>
            <li class="@if(Route::current()->getName() == 'portfolio') active @endif"><a href="{{route('portfolio')}}">Portfolio</a></li>
            <li class="@if(Route::current()->getName() == 'blog') active @endif"><a href="{{route('blog')}}">Blog</a></li>
            <li class="@if(Route::current()->getName() == 'contact') active @endif"><a href="{{route('contact')}}">Contact</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!--header wrapper end