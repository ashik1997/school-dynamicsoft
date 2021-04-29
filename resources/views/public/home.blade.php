@extends('public.layouts.app')
@section('title', 'Home')
@section('content')
<!--slider  wrapper end-->
<div class="slider-area slider-two">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            @foreach($sliders as $key => $slider)
            <div class="carousel-item @if($key==0)active @endif">
                <div class="carousel-captions caption-1" style="background: url(frontend/images/slider/{{$slider->image}}) 50% 0 repeat-y;">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                                <div class="content">
                                  <h2 class="animated zoomIn">{{$slider->title}}<span></span></h2>
                                  <h1>{{$slider->sub_title}}<span></span> </h1>
                                  <p class="animated bounceInUp">{{$slider->description}}</p>
                                    <div class="cc_slider_cont1">
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="carousel-nevigation">
                <a class="prev pulse" href="#carousel-example-generic" role="button" data-slide="prev">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_3" x="0px" y="0px" viewBox="0 0 612.077 612.077" style="enable-background:new 0 0 612.077 612.077;" xml:space="preserve" width="40px" height="40px">
                        <g>
                            <path d="M306.037,0.001C136.997,0.001,0,136.999,0,306.039s137.813,306.037,306.037,306.037s306.037-136.997,306.037-306.037   C612.816,136.999,475.077,0.001,306.037,0.001z M306.037,582.332c-152.203,0-276.368-124.165-276.368-276.368   S153.834,29.596,306.037,29.596s276.368,124.165,276.368,276.368S459.056,582.332,306.037,582.332z M462.245,305.964   c0,8.011-6.379,14.39-14.39,14.39H213.099l83.296,83.296c5.637,5.637,5.637,15.205,0,20.843c-3.189,3.189-6.379,4.005-10.384,4.005   c-4.005,0-7.195-1.632-10.384-4.005l-108.96-108.07c-0.816-0.816-1.632-1.632-1.632-2.374l-0.816-0.816   c0-0.816-0.816-0.816-0.816-1.632c0-0.816,0-0.816-0.816-1.632c0-0.816,0-0.816,0-1.632c0-1.632,0-4.005,0-5.637   c0-0.816,0-0.816,0-1.632s0-0.816,0.816-1.632c0-0.816,0.816-0.816,0.816-1.632c0,0,0-0.816,0.816-0.816   c0.816-0.816,0.816-1.632,1.632-2.374L276.442,184.84c5.637-5.637,15.205-5.637,20.843,0c5.637,5.637,5.637,15.205,0,20.843   l-84.186,85.076h234.683C455.792,290.759,462.245,297.954,462.245,305.964z" fill="#FFFFFF" />
                        </g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                    </svg>
                </a>
                <a class="next" href="#carousel-example-generic" role="button" data-slide="next">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_2" x="0px" y="0px" viewBox="0 0 612.816 612.816" style="enable-background:new 0 0 612.816 612.816;" xml:space="preserve" width="40px" height="40px">
                        <g>
                            <path d="M306.408,0C137.368,0,0.371,136.997,0.371,306.037s136.997,306.779,306.037,306.779s306.037-136.997,306.037-306.037   S475.448,0,306.408,0z M306.408,583.147c-152.203,0-276.368-124.165-276.368-276.368S154.205,29.595,306.408,29.595   S582.776,153.76,582.776,305.963S458.611,583.147,306.408,583.147z M448.968,313.158c0,0,0,0.816-0.816,0.816   c-0.816,0.816-0.816,1.632-1.632,2.374L336.003,426.865c-3.189,3.189-6.379,4.005-10.384,4.005c-4.005,0-7.195-1.632-10.384-4.005   c-5.637-5.637-5.637-15.205,0-20.843l84.928-84.928H165.405c-8.011,0-14.39-6.379-14.39-14.39c0-8.011,6.379-14.39,14.39-14.39   h234.683l-84.038-84.038c-5.637-5.637-5.637-15.205,0-20.843c5.637-5.637,15.205-5.637,20.843,0l108.886,108.96   c0.816,0.816,1.632,1.632,1.632,2.374l0.816,0.816c0,0.816,0.816,0.816,0.816,1.632c0,0.816,0,0.816,0.816,1.632   c0,0.816,0,0.816,0,1.632c0,1.632,0,4.005,0,5.637c0,0.816,0,0.816,0,1.632C449.784,312.416,449.784,312.416,448.968,313.158   C448.968,312.416,448.968,313.158,448.968,313.158z" fill="#FFFFFF" />
                        </g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>
<!--Slider wrapper End -->

<!--service  wrapper start -->
<div class="serv_title_main_wrapper_2">
    <div class="container">
        <div class="row">
            @foreach($services as $service) 
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="pricing_box1_wrapper">
                    <div class="serv_img_wrapper">
                        <img src="{{asset('frontend/')}}/images/service/{{$service->large_icon}}" alt="img">
                    </div>
                    <div class="box1_heading_wrapper">
                        <h1><a href="#">{{$service->service_name}}</a></h1>
                    </div>
                    <div class="pricing_cont_wrapper">
                        <p>{{$service->description}}</p>
                        <h5><a href="{{route('services')}}">Read More <i class="fa fa-long-arrow-right"></i></a></h5>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
</div>
<!-- service wrapper End -->
<!-- about wrapper start-->
<div class="about_us_section_2">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-lg-offset-2">
                <div class="about_heading_wraper med_bottompadder50 wow fadeInDown" data-wow-delay="0.3s">
                    <h1 class="med_bottompadder20">about us</h1>
                    <img src="{{asset('frontend/')}}/images/index_line.png" alt="line" class="med_bottompadder20">
                </div>
            </div>

            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 about_indx_txt">
                <div class="ser_abt_img_resp">
                    <img src="{{asset('frontend/')}}/images/{{ $about->image }}" alt="img" class="img-responsive">
                </div>
            </div>
            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="abt_txt">
                    <h3>{{ $about->title }}</h3>
                    <p class="med_toppadder20">{{ App\Models\SiteInfo::pluck('short_about')[0] }}</p>
                </div>
                <div class="abt_chk med_toppadder20">
                    <div class="content_chck">
                        <ul>
                          @foreach($work_process as $work_proces)
                            <li><i class="fa fa-check-square-o" aria-hidden="true"></i><span>{{$work_proces->title}}</span>
                            </li>
                          @endforeach
                        </ul>
                    </div>
                </div>
                <div class="about_btn">
                    <ul>
                        <li><a href="{{route('about')}}">read more</a>
                        </li>
                    </ul>
                </div>
                <div class="portfolio-area med_toppadder">
                    <div class="row three-column">
                        <div class="about_port_section">
                            <ul>
                              @foreach($work_process as $work_proces)
                              <li>
                                <div class="portfolio-thumb">
                                  <div class="gc_filter_cont_overlay_wrapper port_uper_div">
                                    <img src="{{asset('frontend/')}}/images/work_process/{{ $work_proces->banner }}"  class="zoom image "  alt="" style="height: 100px;width: 100px;" />
                                    <div class="gc_filter_cont_overlay zoom_popup">
                                      <div class="gc_filter_text"><a href="{{asset('frontend/')}}/images/work_proces/{{ $work_proces->banner }}"><i class="fa fa-plus"></i></a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </li>
                              @endforeach
                            </ul>
                            <!-- /.portfolio-thumb -->
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!--about wrapper end-->
<!--ser_blog section start-->
<div class="blog_wrapper med_toppadder100 med_bottompadder90">
  <div class="container">
    <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-lg-offset-2">
          <div class="team_heading_wrapper med_bottompadder50 wow fadeInDown" data-wow-delay="0.3s">
              <h1 class="med_bottompadder20">all services</h1>
              <img src="{{asset('frontend/')}}/images/Icon_team.png" alt="line" class="med_bottompadder20">
          </div>
      </div>
      @foreach($servicess as $service) 
      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
        <div class="blog_about blog_resp wow SlideInLeft" data-wow-delay="0.4s">
          <div class="blog_img blog_img_resp">
            <figure>
            <img src="{{asset('frontend/')}}/images/service/{{$service->large_icon}}" alt="img" class="img-responsive">
            </figure>
          </div>
          <div class="blog_txt">
            <h1><a href="#">{{$service->service_name}}</a></h1>
            <p>{{$service->description}}</p>
            <!-- <a href="#">Read More <i class="fa fa-long-arrow-right"></i></a> -->
          </div>
          </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
<!-- ser_blog section end-->
<!--team wrapper start-->
<div class="team_wrapper_2 med_toppadder100">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-lg-offset-2">
                <div class="team_heading_wrapper med_bottompadder40 wow fadeInDown" data-wow-delay="0.5s">
                    <h1 class="med_bottompadder20">MEET OUR TEAM</h1>
                    <img src="{{asset('frontend/')}}/images/Icon_team.png" alt="line" class="med_bottompadder20">
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="team_slider_wrapper">
                    <div class="owl-carousel owl-theme">
                        <div class="item"><div class="row">
                        <?php
                        $i = 0;
                        ?>
                        @foreach($teams as $team) 
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="team_about">
                                <div class="team_icon_wrapper">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_9" x="0px" y="0px" viewBox="0 0 300.346 300.346" style="enable-background:new 0 0 300.346 300.346;" xml:space="preserve" width="40px" height="40px">
                                        <g><g><g><path d="M296.724,157.793c-3.611-5.821-9.552-9.841-16.299-11.03c-6.746-1.188-13.703,0.559-19.139,4.836l-21.379,17.126     c-3.533-3.749-8.209-6.31-13.359-7.218c-6.749-1.189-13.704,0.559-19.1,4.805l-12.552,9.921H162.66     c-5.152,0-10.301-1.238-14.891-3.579l-11.486-5.861c-9.678-4.938-20.532-7.328-31.385-6.908     c-15.046,0.579-29.448,6.497-40.554,16.666l-61.89,56.667c-2.901,2.656-3.28,7.093-0.873,10.203l32.406,41.867     c1.481,1.913,3.714,2.933,5.983,2.933c1.374,0,2.762-0.374,4.003-1.151L82.944,262.7c2.777-1.736,5.975-2.654,9.25-2.654h90.428     c12.842,0,25.446-4.407,35.489-12.409l73.145-58.281C300.815,181.745,303.166,168.176,296.724,157.793z M216.81,178.183     c2.037-1.601,4.564-2.236,7.114-1.787c1.536,0.271,2.924,0.913,4.087,1.856l-12.645,10.129c-1.126-2.111-2.581-4.019-4.283-5.672     L216.81,178.183z M281.837,177.528L208.69,235.81c-7.377,5.878-16.635,9.116-26.068,9.116H92.194     c-6.113,0-12.083,1.714-17.267,4.954l-33.169,20.743l-23.959-30.954L74.554,187.7c8.469-7.753,19.451-12.267,30.924-12.708     c8.279-0.323,16.554,1.504,23.933,5.268l11.486,5.861c6.707,3.422,14.233,5.231,21.763,5.231h32.504     c4.278,0,7.758,3.48,7.758,7.758c0,4.105-3.211,7.507-7.309,7.745l-90.45,5.252c-4.168,0.242-7.351,3.817-7.109,7.985     s3.822,7.346,7.985,7.109l90.45-5.252c9.461-0.549,17.317-6.817,20.282-15.32l53.916-43.189c2.036-1.602,4.561-2.237,7.114-1.787     c2.552,0.449,4.709,1.909,6.075,4.111C286.277,169.634,285.401,174.691,281.837,177.528z" fill="#FFFFFF" /><path d="M161.7,132.383c13.183,0,25.302-6.625,32.418-17.722c7.117-11.097,8.082-24.875,2.581-36.855L168.57,16.531     c-1.232-2.685-3.916-4.406-6.87-4.406s-5.638,1.721-6.87,4.406l-28.129,61.274c-5.5,11.981-4.535,25.759,2.581,36.855     C136.398,125.757,148.517,132.383,161.7,132.383z M140.441,84.114L161.7,37.807l21.258,46.307     c3.341,7.277,2.754,15.645-1.568,22.385c-4.323,6.74-11.683,10.764-19.69,10.764c-8.007,0-15.368-4.024-19.69-10.765     C137.687,99.759,137.101,91.391,140.441,84.114z" fill="#FFFFFF" /></g></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
                                    </svg>
                                </div>
                                <div class="team_img">
                                    <img src="{{asset('frontend/')}}/images/team/{{$team->image}}" alt="img" class="img-responsive">
                                </div>
                                <div class="team_txt">
                                    <h1><a href="#">{{$team->name}}</a></h1>
                                    <p>({{$team->job_title}})</p>
                                </div>
                                <div class="team_icon_hover our_doc_icn_hovr">
                                    <ul>
                                        <li><a href="{{$team->facebook}}"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="{{$team->twitter}}"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="{{$team->linkedin}}"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                        <li><a href="{{$team->youtube}}"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                          <?php
                          $i++;
                          ?>
                          @if ($i % 4 == 0)
                          </div></div><div class="item"><div class="row">
                          @endif
                        @endforeach
                        </div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--team wrapper end-->
<!-- counter wrapper start-->
<div class="counter_section_2">
    <div class="counter_overlay">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-lg-offset-2">
                    <div class="service_heading_wraper text-center med_bottompadder50 wow fadeInDown" data-wow-delay="0.3s">
                        <h1 class="med_bottompadder20">our achivement</h1>
                        <img src="{{asset('frontend/')}}/images/index_line.png" alt="line" class="med_bottompadder20">
                    </div>
                </div>
            </div>
        </div>
        <section class="counter-section section-padding" data-stellar-background-ratio="0.5">
            <div class="container text-center">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="icon"> <a href="#"><i class="fa fa-users"></i></a>
                        </div>
                        <div class="count-description"> <span class="timer">2500</span>
                            <h5 class="con1">Satisfied Patients</h5>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="icon"> <a href="#"><i class="fa fa-user-md"></i></a>
                        </div>
                        <div class="count-description"> <span class="timer">195</span>
                            <h5 class="con2">doctor's team</h5>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="icon"> <a href="#"><i class="fa fa-trophy"></i></a>
                        </div>
                        <div class="count-description"> <span class="timer">2155</span>
                            <h5 class="con2">success mission</h5>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="icon"> <a href="#"><i class="fa fa-ambulance"></i></a>
                        </div>
                        <div class="count-description"> <span class="timer">257</span>
                            <h5 class="con4">Successfull Surgeries</h5>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<!-- counter wrapper end-->

<!--portfolio erapper start-->

<div id="gridWrapper" class="fliter_main_wrapper_2">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-lg-offset-2">
                <div class="team_heading_wrapper text-center med_bottompadder40 wow fadeInDown" data-wow-delay="0.3s">
                    <h1 class="med_bottompadder20">our recent work</h1>
                    <img src="{{asset('frontend/')}}/images/Icon_team.png" alt="line" class="med_bottompadder20">
                </div>
            </div>
            <div class="portfolio-area">
                <div class="container">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <!-- <ul class="protfoli_filter">
                            <li class="active" data-filter=".all"><a href="#"> All</a></li>
                            <li data-filter=".business"><a href="#">urologists</a></li>
                            <li data-filter=".website"><a href="#">dermatologists</a></li>
                            <li data-filter=".logo"><a href="#">immunologists</a></li>
                            <li data-filter=".photoshop"><a href="#">pathologists</a></li>
                        </ul> -->
                    </div>
                    <div class="col-lg-12">
                        <div class="row portfoli_inner">
                            @foreach($galleries as $gallery)
                            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12 portfolio-wrapper all website logo">
                                <div class="portfolio-thumb">
                                    <div class="gc_filter_cont_overlay_wrapper">
                                        <img src="{{asset('frontend/')}}/images/gallery/{{$gallery->image}}" class="zoom image img-responsive" alt="service_img" />
                                        <div class="gc_filter_cont_overlay zoom_popup">
                                            <div class="gc_filter_text"><a href="{{asset('frontend/')}}/images/gallery/{{$gallery->image}}"><i class="fa fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.portfolio-thumb -->
                            </div>
                            @endforeach
                        </div>
                        <!--/#gridWrapper-->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="gc_filter_btn">
                                <ul>
                                    <li><a href="{{route('gallery')}}">SEE MORE</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container -->
            </div>
            <!--/.portfolio-area-->
        </div>
    </div>
</div>
<!--portfolio Wrapper End -->
<!--call us Wrapper start -->
<div class="call_wrapper_2">
    <div class="call_overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-lg-offset-2">
                <div class="call_heading_wraper text-center wow fadeInDown" data-wow-delay="0.3s">
                    <h1 class="med_bottompadder40">{{ App\Models\SiteInfo::pluck('phone')[0] }}</h1>
                    <h3 class="med_bottompadder40">We provide 24/7 customer support. Please feel free to contact us for emergency case.</h3>
                    <div class="appointmnt_wrapper_2 text-center">
                        <div class="appoint_btn_2">
                            <ul>
                                <li><a href="#"><span class="hidden-sm"><i class="fa fa-calendar"></i>Make a </span>Appointment</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--call us wrapper end-->
<!-- blog wrapper start-->
<div class="blog_wrapper_2 med_toppadder100 med_bottompadder90">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-lg-offset-2">
                <div class="team_heading_wrapper med_bottompadder50 wow fadeInDown" data-wow-delay="0.3s">
                    <h1 class="med_bottompadder20">our News & blog</h1>
                    <img src="{{asset('frontend/')}}/images/Icon_team.png" alt="line" class="med_bottompadder20">
                </div>
            </div>
            @foreach($blogs as $blog)
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="blog_about">
                  <div class="blog_img blog_post_img">
                    <figure>
                      <img src="{{asset('frontend/')}}/images/blog/{{$blog->image}}" alt="img" class="img-responsive">
                    </figure>
                  </div>
                  <div class="blog_txt">
                      <h1><a href="{{route('single-blog',$blog->id)}}">{{$blog->title}}</a></h1>
                      <div class="blog_txt_info">
                        <ul>
                          <li>BY {{$blog->user->name}}</li>
                          <li>{{date('F d,Y', strtotime($blog->craeted_at))}}</li>
                        </ul>
                      </div>
                      <a href="{{route('single-blog',$blog->id)}}">Read More <i class="fa fa-long-arrow-right"></i></a>
                  </div>
              </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- blog wrapper end-->
<!-- booking wrapper start -->
<div class="booking_wrapper_2 med_toppadder100 med_bottompadder90">
    <div class="map_main_wrapper">
        {!! App\Models\SiteInfo::pluck('map_embed')[0] !!}
    </div>
    <div class="container">

        <form class="booking_box">
            <div class="box_side_icon">
                <img src="{{asset('frontend/')}}/images/Icon_bk.png" alt="img">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12  col-12">
                        <div class="contect_form1">
                            <input type="text" name="full_name" placeholder="Full Name" class="require">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12  col-12">
                        <div class="contect_form1">
                            <input type="text" name="email" placeholder="Email" class="require" data-valid="email" data-error="Email should be valid.">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12  col-12">
                        <div class="contect_form1">
                            <input type="text" name="contact_no" placeholder="Phone" class="require">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12  col-12">
                        <div class="contect_form1">
                            <input type="text" name="subject" placeholder="Subject">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12  col-12">
                        <div class="contect_form3">
                            <input type="text" name="date" placeholder="Date" class="require"><i class="fa fa-calendar-o" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12  col-12">
                        <div class="contect_form3">
                            <input type="text" name="time" placeholder="Time" class="require"><i class="fa fa-clock-o" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12  col-12">
                        <div class="contect_form4">
                            <textarea rows="4" name="message" placeholder="Message" class="require"></textarea>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12  col-12">
                        <div class="response"></div>
                        <div class="contect_btn">
                            <button type="button" class="submitForm">Send a Message</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="chat_box">
            <div class="booking_box_2">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="booking_box_img">
                            <img src="{{asset('frontend/')}}/images/booking_call.png" alt="img" class="img-circle">
                        </div>
                        <div class="booking_chat">
                            <h1>{{ App\Models\SiteInfo::pluck('phone')[0] }}</h1>
                            <p>if urgent. Your personal case manager will ensure that you receive the best possible care.</p>
                        </div>
                        <div class="booking_btn">
                            <ul>
                                <li><a href="#">LIVE CHAT</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!--booking wrapper end-->

@endsection
