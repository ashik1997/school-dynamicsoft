@extends('public.layouts.app')
@section('title','Services')
@section('content')
<!--med_tittle_section-->
<div class="med_tittle_section">
    <div class="med_img_overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="med_tittle_cont_wrapper">
                    <div class="med_tittle_cont">
                        <h1>Our Services</h1>
                        <ol class="breadcrumb">
                            <li><a href="/">Home</a></li>
                            <li>Services</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- med_tittle_section End -->
<!--service section start-->
<div class="team_wrapper med_toppadder100">
  <div class="container">
    <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-lg-offset-2">
        <div class="team_heading_wrapper med_bottompadder40">
          <h1 class="med_bottompadder20">MOST POPULAR SERVICES</h1>
          <img src="{{asset('frontend/')}}/images/Icon_team.png" alt="line" class="med_bottompadder20">
        </div>
      </div>
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="ser_slider_wrapper">
          <div class="owl-carousel owl-theme">
            <div class="item"><div class="row">
            <?php
            $i = 0;
            ?>
            @foreach($services as $service) 
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
              <div class="cat_about ser_section">
                <div class="icon_wrapper">
                  <img src="{{asset('frontend/')}}/images/service/{{$service->small_icon}}" alt="img" class="img-responsive">
                </div>
                <div class="cat_img">
                  <img src="{{asset('frontend/')}}/images/service/{{$service->small_icon}}" alt="img" class="img-responsive">
                </div>
                <div class="cat_txt">
                  <h1>{{$service->service_name}}</h1>
                  <p>{{$service->description}}</p>
                  <a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
                </div>
              </div>
            </div>
              <?php
              $i++;
              ?>
              @if ($i % 3 == 0)
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
<!--service section end-->
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
      @foreach($services as $service) 
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
@endsection