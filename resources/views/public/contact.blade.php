@extends('public.layouts.app')
@section('title','Contact Us')
@section('content')
<!-- med_tittle_section-->
<div class="med_tittle_section">
    <div class="med_img_overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="med_tittle_cont_wrapper">
                    <div class="med_tittle_cont">
                        <h1>Contact Us</h1>
                        <ol class="breadcrumb">
                            <li><a href="/">Home</a>
                            </li>
                            <li>Contact</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- med_tittle_section End-->
<!--contact us section start -->
<div class="contact_us_section med_toppadder100 med_bottompadder70">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                <div class="choose_heading_wrapper med_bottompadder30">
                  <h1 class="med_bottompadder20">Contact us</h1>
                  <img src="{{asset('frontend/')}}/images/line.png" alt="title" class="med_bottompadder20">
                </div>
                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible" id="myAlert">
                  <a href="#" class="close">&times;</a>
                  <ul>
                  @foreach ($errors->all() as $error)
                    <li>
                    <strong>Oh sanp!</strong> {{ $error }}
                    </li>
                  @endforeach
                  </ul>
                </div>
                @endif
                <form action="{{route('contact-send-message')}}" method="post">
                  @csrf
                    <div class="cont_main_section">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="contect_form1 dc_cont_div">
                                    <input type="text" name="name" placeholder="Full Name" class="require" value="{{old('name')}}">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="contect_form1 dc_cont_div">
                                    <input type="text" name="email" placeholder="Email" class="require" data-valid="email" data-error="Email should be valid." value="{{old('email')}}">
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="contect_form1 dc_cont_div">
                                    <input type="text" name="subject" placeholder="Subject" value="{{old('subject')}}">
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="contect_form4 dc_cont_div">
                                    <textarea rows="5" name="message" placeholder="Message" class="require">{{old('message')}}</textarea>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="response"></div>
                                <div class="contact_btn_wrapper med_toppadder30">
                                    <button type="submit" class="submitForm">submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>
<!--contact us section end-->
<!-- dc category section start-->
<div class="category_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="cat_about cont_cat_abt">
                    <div class="icon_wrapper dc_icon_section">
                        <img src="{{asset('frontend/')}}/images/icon_map.png" alt="img" class="img-responsive">
                    </div>

                    <div class="cat_txt cont_cat_txt">
                        <h1>{{$site_info->address}}</h1>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="cat_about cont_cat_abt">
                    <div class="icon_wrapper dc_icon_section">
                        <img src="{{asset('frontend/')}}/images/icon_call.png" alt="img" class="img-responsive">
                    </div>

                    <div class="cat_txt cont_cat_txt">
                        <h1>{{$site_info->phone}}/h1>

                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="cat_about cont_cat_abt">
                    <div class="icon_wrapper dc_icon_section">
                        <img src="{{asset('frontend/')}}/images/icon_envelope.png" alt="img" class="img-responsive">
                    </div>

                    <div class="cat_txt cont_cat_txt cont_last_child">
                        <a href="#"><h1>{{$site_info->email}}</h1></a>
                        <p>24 / 7online help support</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="map_main_wrapper cont_dc_map">
      {!!$site_info->map_embed!!}
    </div>
</div>
<!-- dc category section end-->
@endsection