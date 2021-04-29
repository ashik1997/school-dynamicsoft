@extends('public.layouts.app')
@section('title','About Us')
@section('content')
<!--med_tittle_section-->
<div class="med_tittle_section">
    <div class="med_img_overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="med_tittle_cont_wrapper">
                    <div class="med_tittle_cont">
                        <h1>about us </h1>
                        <ol class="breadcrumb">
                            <li><a href="/">Home</a>
                            </li>
                            <li>about us</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- med_tittle_section End -->
<!--about us section start-->
<div class="about_us_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="about_img">
                    <img src="{{asset('frontend/')}}/images/{{$about->image}}" alt="img" class="img-responsive">
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 med_toppadder70">
                <div class="abt_heading_wrapper abt_2_heading">
                    <h1 class="med_bottompadder20">about {{ App\Models\SiteInfo::pluck('site_name')[0] }}</h1>
                    <img src="{{asset('frontend/')}}/images/line.png" alt="title" class="med_bottompadder20">
                </div>
                <div class="abt_txt">
                  <h3>{{$about->title}}</h3>
                </div>
                <!-- <div class="abt_chk med_toppadder30">
                  {!!$about->video!!}
                </div> -->
                <div class="abt_txt">
                  {!!$about->description!!}
                </div>
            </div>
        </div>
    </div>
</div>
<!--about us section end-->
<!-- counter wrapper start-->
<div class="counter_section">
    <div class="counter_overlay">
        <section class="counter-section section-padding" data-stellar-background-ratio="0.5">
            <div class="container text-center">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="icon">
                            <a href="#"><img src="{{asset('frontend/')}}/images/png/patient.png" alt="img" class="img-responsive">
                            </a>
                        </div>
                        <div class="count-description">
                            <span class="timer">2340</span>
                            <h5 class="con1">Satisfied Patients</h5>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="icon">
                            <a href="#"><img src="{{asset('frontend/')}}/images/png/doctor.png" alt="img" class="img-responsive">
                            </a>
                        </div>
                        <div class="count-description">
                            <span class="timer">335</span>
                            <h5 class="con2">doctor's team</h5>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="icon">
                            <a href="#"><img src="{{asset('frontend/')}}/images/png/success.png" alt="img" class="img-responsive">
                            </a>
                        </div>
                        <div class="count-description">
                            <span class="timer">1305</span>
                            <h5 class="con2">success mission</h5>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="icon">
                            <a href="#"><img src="{{asset('frontend/')}}/images/png/heart.png" alt="img" class="img-responsive">
                            </a>
                        </div>
                        <div class="count-description">
                            <span class="timer">1540</span>
                            <h5 class="con4">Successfull Surgeries</h5>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<!-- counter wrapper end-->
<!-- abt service wrapper start-->
<div class="abt_service_section med_toppadder100">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-lg-offset-2">
                <div class="team_heading_wrapper med_bottompadder50">
                    <h1 class="med_bottompadder20">we give you the best </h1>
                    <img src="{{asset('frontend/')}}/images/Icon_team.png" alt="line" class="med_bottompadder20">
                </div>
            </div>
            @foreach($work_process as $key => $wp_info)
            @if ($key % 2 == 0)
            <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
              <div class="abt_left_section med_bottompadder20">
                <img src="{{asset('frontend/')}}/images/work_process/{{$wp_info->banner}}" alt="img" class="img-responsive">
              </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
              <div class="sidebar_wrapper sidebar_right_abt">
                <div class="accordionFifteen">
                  <div class="panel-group" id="accordion{{$key+1}}" role="tablist">
                    <div class="panel panel-default sidebar_pannel">
                      <div class="panel-heading desktop">
                        <h4 class="panel-title"><a class="collapsed active" data-toggle="collapse" href="#collapse{{$key+1}}" aria-expanded="false">- {{$wp_info->title}}</a></h4>
                      </div>
                      <div id="collapse{{$key+1}}" class="panel-collapse collapse show" data-parent="#accordion{{$key+1}}" aria-expanded="true" role="tabpanel">
                        <div class="panel-body">
                          <div class="panel_cont">
                            {!!$wp_info->description!!}
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.panel-default -->
                  </div>
                  <!--end of /.panel-group-->
                </div>
              </div>
            </div>
            </div>
            @else
            <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
              <div class="sidebar_wrapper sidebar_right_abt">
                <div class="accordionFifteen">
                  <div class="panel-group" id="accordion{{$key+1}}" role="tablist">
                    <div class="panel panel-default sidebar_pannel">
                      <div class="panel-heading desktop">
                        <h4 class="panel-title"><a class="collapsed active" data-toggle="collapse" href="#collapse{{$key+1}}" aria-expanded="false">- {{$wp_info->title}}</a></h4>
                      </div>
                      <div id="collapse{{$key+1}}" class="panel-collapse collapse show" data-parent="#accordion{{$key+1}}" aria-expanded="true" role="tabpanel">
                        <div class="panel-body">
                          <div class="panel_cont">
                            <p>{!!$wp_info->description!!}</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.panel-default -->
                  </div>
                  <!--end of /.panel-group-->
                </div>
              </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
              <div class="abt_left_section med_bottompadder20">
                <img src="{{asset('frontend/')}}/images/work_process/{{$wp_info->banner}}" alt="img" class="img-responsive">
              </div>
            </div>
            </div>
            @endif 
            @endforeach
        </div>
    </div>
</div>
<!-- abt service wrapper end-->
<!--top service wrapper start-->
<!-- counter wrapper start-->
<div class="top_service_wrapper">
    <div class="top_serv_overlay">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-lg-offset-2">
                    <div class="team_heading_wrapper med_bottompadder50 wow fadeInDown" data-wow-delay="0.3s">
                        <h1 class="med_bottompadder20">We provide top services</h1>
                        <img src="{{asset('frontend/')}}/images/Icon_team.png" alt="line" class="med_bottompadder20">
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="cat_about top_serv_txt">
                        <div class="icon_wrapper">
                            <img src="{{asset('frontend/')}}/images/icon1.png" alt="img" class="img-responsive">
                        </div>
                        <div class="cat_img">
                            <img src="{{asset('frontend/')}}/images/icon_11.png" alt="img" class="img-responsive">
                        </div>
                        <div class="cat_txt">
                            <h1>Heart Surgery</h1>
                            <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin at the good health for you.</p>
                            <a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="cat_about top_serv_txt">
                        <div class="icon_wrapper">
                            <img src="{{asset('frontend/')}}/images/icon2.png" alt="img" class="img-responsive">
                        </div>
                        <div class="cat_img">
                            <img src="{{asset('frontend/')}}/images/icon_2.png" alt="img" class="img-responsive">
                        </div>
                        <div class="cat_txt">
                            <h1>Emergency Care</h1>
                            <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin at the good health for you.</p>
                            <a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="cat_about top_serv_txt">
                        <div class="icon_wrapper">
                            <img src="{{asset('frontend/')}}/images/icon3.png" alt="img" class="img-responsive">
                        </div>
                        <div class="cat_img cat_img_3">
                            <img src="{{asset('frontend/')}}/images/icon_3.png" alt="img" class="img-responsive">
                        </div>
                        <div class="cat_txt">
                            <h1>Dental Care</h1>
                            <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin at the good health for you.</p>
                            <a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- top service wrapper end-->
<!--event wrapper start-->
<div class="event_wrapper med_toppadder100 med_bottompadder70">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="choose_heading_wrapper">
                    <h1 class="med_bottompadder20">Upcoming Events</h1>
                    <img src="{{asset('frontend/')}}/images/line.png" alt="title" class="med_bottompadder60">
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="event_slider_wrapper">
                    <div class="owl-carousel owl-theme">
                        <div class="item">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="img_section d-none d-sm-none d-md-none d-lg-block">
                                        <div class="icon_wrapper_event">
                                            <i class="fa fa-star-o" aria-hidden="true"></i>
                                        </div>
                                        <div class="img_wrapper1">

                                            <img src="{{asset('frontend/')}}/images/event_1.jpg" alt="img" class="img-responsive">
                                        </div>
                                        <div class="event_icon1">
                                            <h2><a href="#">Together we can do so much</a></h2>
                                            <ul>
                                                <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>
                      California,UK</a>
                                                </li>
                                                <li><i class="fa fa-calendar-o" aria-hidden="true"></i>24 Nov, 2020</li>
                                            </ul>
                                            <p>Proin gravida nibh vel velit auctor aliuet. Aenean sollicitudin, aks lorem quis aks bibendum auctor.</p>
                                        </div>
                                    </div>
                                    <div class="img_section">
                                        <div class="icon_wrapper_event">
                                            <i class="fa fa-star-o" aria-hidden="true"></i>
                                        </div>
                                        <div class="img_wrapper1">
                                            <img src="{{asset('frontend/')}}/images/event_2.jpg" alt="img" class="img-responsive">
                                        </div>
                                        <div class="event_icon1">
                                            <h2><a href="#">Together we can do so much</a></h2>
                                            <ul>
                                                <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>California,UK</a>
                                                </li>
                                                <li><i class="fa fa-calendar-o" aria-hidden="true"></i>24 Nov, 2020</li>

                                            </ul>
                                            <p>Proin gravida nibh vel velit auctor aliuet. Aenean sollicitudin, aks lorem quis aks bibendum auctor.</p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="img_section d-none d-sm-none d-md-none d-lg-block">
                                        <div class="icon_wrapper_event">
                                            <i class="fa fa-star-o" aria-hidden="true"></i>
                                        </div>
                                        <div class="img_wrapper1">
                                            <img src="{{asset('frontend/')}}/images/event_3.jpg" alt="img" class="img-responsive">
                                        </div>
                                        <div class="event_icon1">
                                            <h2><a href="#">Together we can do so much</a></h2>
                                            <ul>
                                                <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>California,UK</a>
                                                </li>
                                                <li><i class="fa fa-calendar-o" aria-hidden="true"></i>24 Nov, 2020</li>
                                            </ul>
                                            <p>Proin gravida nibh vel velit auctor aliuet. Aenean sollicitudin, aks lorem quis aks bibendum auctor.</p>
                                        </div>
                                    </div>
                                    <div class="img_section d-none d-sm-none d-md-none d-lg-block">
                                        <div class="icon_wrapper_event">
                                            <i class="fa fa-star-o" aria-hidden="true"></i>
                                        </div>
                                        <div class="img_wrapper1">
                                            <img src="{{asset('frontend/')}}/images/event_4.jpg" alt="img" class="img-responsive">
                                        </div>
                                        <div class="event_icon1">
                                            <h2><a href="#">Together we can do so much</a></h2>
                                            <ul>
                                                <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>California,UK</a>
                                                </li>
                                                <li><i class="fa fa-calendar-o" aria-hidden="true"></i>24 Nov, 2020</li>
                                            </ul>
                                            <p>Proin gravida nibh vel velit auctor aliuet. Aenean sollicitudin, aks lorem quis aks bibendum auctor.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="img_section">
                                        <div class="icon_wrapper_event">
                                            <i class="fa fa-star-o" aria-hidden="true"></i>
                                        </div>
                                        <div class="img_wrapper1">
                                            <img src="{{asset('frontend/')}}/images/event_1.jpg" alt="img" class="img-responsive">
                                        </div>
                                        <div class="event_icon1">
                                            <h2><a href="#">Together we can do so much</a></h2>
                                            <ul>
                                                <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>California,UK</a>
                                                </li>
                                                <li><i class="fa fa-calendar-o" aria-hidden="true"></i>24 Nov, 2020</li>
                                            </ul>
                                            <p>Proin gravida nibh vel velit auctor aliuet. Aenean sollicitudin, aks lorem quis aks bibendum auctor.</p>
                                        </div>
                                    </div>
                                    <div class="img_section d-none d-sm-none d-md-none d-lg-block">
                                        <div class="icon_wrapper_event">
                                            <i class="fa fa-star-o" aria-hidden="true"></i>
                                        </div>
                                        <div class="img_wrapper1">
                                            <img src="{{asset('frontend/')}}/images/event_2.jpg" alt="img" class="img-responsive">
                                        </div>
                                        <div class="event_icon1">
                                            <h2><a href="#">Together we can do so much</a></h2>
                                            <ul>
                                                <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>California,UK</a>
                                                </li>
                                                <li><i class="fa fa-calendar-o" aria-hidden="true"></i>24 Nov, 2020</li>
                                            </ul>
                                            <p>Proin gravida nibh vel velit auctor aliuet. Aenean sollicitudin, aks lorem quis aks bibendum auctor.</p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="img_section d-none d-sm-none d-md-none d-lg-block">
                                        <div class="icon_wrapper_event">
                                            <i class="fa fa-star-o" aria-hidden="true"></i>
                                        </div>
                                        <div class="img_wrapper1">
                                            <img src="{{asset('frontend/')}}/images/event_3.jpg" alt="img" class="img-responsive">
                                        </div>
                                        <div class="event_icon1">
                                            <h2><a href="#">Together we can do so much</a></h2>
                                            <ul>
                                                <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>California,UK</a>
                                                </li>
                                                <li><i class="fa fa-calendar-o" aria-hidden="true"></i>24 Nov, 2017</li>
                                            </ul>
                                            <p>Proin gravida nibh vel velit auctor aliuet. Aenean sollicitudin, aks lorem quis aks bibendum auctor.</p>
                                        </div>
                                    </div>
                                    <div class="img_section d-none d-sm-none d-md-none d-lg-block">
                                        <div class="icon_wrapper_event">
                                            <i class="fa fa-star-o" aria-hidden="true"></i>
                                        </div>
                                        <div class="img_wrapper1">
                                            <img src="{{asset('frontend/')}}/images/event_4.jpg" alt="img" class="img-responsive">
                                        </div>
                                        <div class="event_icon1">
                                            <h2><a href="#">Together we can do so much</a></h2>
                                            <ul>
                                                <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>California,UK</a>
                                                </li>
                                                <li><i class="fa fa-calendar-o" aria-hidden="true"></i>24 Nov, 2020</li>
                                            </ul>
                                            <p>Proin gravida nibh vel velit auctor aliuet. Aenean sollicitudin, aks lorem quis aks bibendum auctor.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- event wrapper end-->

@endsection