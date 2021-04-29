client wrapper start-->
<div class="partner_wrapper_2 med_bottompadder80">
  <div class="container">
    <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="partner_slider_img">
          <div class="owl-carousel owl-theme">
            @foreach(App\Models\Client::get() as $key => $client)
            <div class="item">
              <img src="{{asset('frontend/')}}/images/clients/{{$client->logo}}" class="img-responsive" alt="{{$client->name}}" />
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--client wrapper end-->
<!-- footer wrapper start-->
<div class="footer_wrapper">
  <div class="container">
    <div class="box_1_wrapper">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="address_main">
            <div class="footer_widget_add">
              @if (file_exists('frontend/images/logo/'.App\Models\SiteInfo::pluck('header_logo')[0]))
              <a href="/"><img src="{{asset('frontend/')}}/images/logo/{{ App\Models\SiteInfo::pluck('header_logo')[0] }}" alt="" class="img-responsive"></a>
              @else
              <h1><a href="/">{{ App\Models\SiteInfo::pluck('site_name')[0] }}</a></h1>
              @endif
              <p>{{ App\Models\SiteInfo::pluck('short_about')[0] }}</p>
                <a href="{{route('about')}}">Read More <i class="fa fa-long-arrow-right"></i></a>
            </div>
            <div class="footer_box_add">
              <ul>
                <li><i class="fa fa-map-marker" aria-hidden="true"></i><span>Address : </span>{{ App\Models\SiteInfo::pluck('address')[0] }}</li>
                <li><i class="fa fa-phone" aria-hidden="true"></i><span>Call us : </span>{{ App\Models\SiteInfo::pluck('phone')[0] }}</li>
                <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="#"><span>Email :</span> {{ App\Models\SiteInfo::pluck('email')[0] }}</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--footer_1-->
    <div class="booking_box_div">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="footer_main_wrapper">
            <div class="row">
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 gallary_response  d-md-none d-lg-block">
                <div class="footer_heading">
                  <h1 class="med_bottompadder10">Gallery</h1>
                  <img src="{{asset('frontend/')}}/images/line.png" class="img-responsive" alt="img" />
                </div>
                <div class="footer_gallary">
                  <div class="row">
                    <ul>
                      @foreach(App\Models\Gallery::orderBy('id', 'DESC')->paginate(8) as $key => $gallery)
                      <li><img src="{{asset('frontend/')}}/images/gallery/{{$gallery->image}}" width="80" height="80" alt="img" class="img-responsive"></li>
                      @endforeach
                    </ul>
                  </div>
                </div>
              </div>
              <!--footer_2-->
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 respons_footer_nav d-none d-sm-none d-md-block">
                <div class="footer_heading footer_menu">
                  <h1 class="med_bottompadder10">Userful</h1>
                  <img src="{{asset('frontend/')}}/images/line.png" class="img-responsive" alt="img" />
                </div>
                <div class="footer_ul_wrapper">
                  <ul>
                    <li><i class="fa fa-caret-right" aria-hidden="true"></i> <a href="{{route('home')}}">home</a></li>
                    <li><i class="fa fa-caret-right" aria-hidden="true"></i><a href="{{route('about')}}">about us</a></li>
                    <li><i class="fa fa-caret-right" aria-hidden="true"></i><a href="{{route('services')}}">depertments</a></li>
                    <li><i class="fa fa-caret-right" aria-hidden="true"></i><a href="{{route('team')}}">team</a></li>
                    <li><i class="fa fa-caret-right" aria-hidden="true"></i><a href="{{route('gallery')}}">gallery</a></li>
                    <li><i class="fa fa-caret-right" aria-hidden="true"></i><a href="{{route('blog')}}">blog</a></li>
                    <li><i class="fa fa-caret-right" aria-hidden="true"></i><a href="{{route('contact')}}">contact</a></li>
                  </ul>
                </div>
              </div>
              <!--footer_3-->
              <!-- <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 contact_last_div">
                  <div class="footer_heading">
                      <h1 class="med_bottompadder10">Opening Hours</h1>
                      <img src="{{asset('frontend/')}}/images/line.png" class="img-responsive" alt="img" />
                  </div>
                  <div class="footer_cnct">
                      <p>Monday – Friday ------<span>09:00-17:00</span></p>
                      <p>Saturday -----------------<span>09:30-17:00</span></p>
                      <p>Sunday -------------------<span>10:30-18:00</span></p>
                  </div>
              </div> -->
              <!--footer_4-->
            </div>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="footer_botm_wrapper">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="bottom_footer_copy_wrapper">
                  <span>Copyright © 2020- <a href="#">{{ App\Models\SiteInfo::pluck('site_name')[0] }}</a>Developed by <a href="softcareit.com">SoftCare IT</a></span>
                </div>
                <div class="footer_btm_icon">
                  <ul>
                    @foreach(App\Models\SocialMedia::get() as $key => $social_media)
                    <li><a href="{{$social_media->url}}" class="{{$social_media->name}}">{!!$social_media->icon!!}</a></li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!--footer_5-->
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="up_wrapper">
        <a href="javascript:" id="return-to-top"><i class="fa fa-arrow-circle-o-up" aria-hidden="true"></i></a>
      </div>
    </div>
  </div>
</div>
<!--footer wrapper end