@extends('public.layouts.app')
@section('title','Gallery')
@section('content')
<!--med_tittle_section-->
<div class="med_tittle_section">
  <div class="med_img_overlay"></div>
  <div class="container">
      <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              <div class="med_tittle_cont_wrapper">
                  <div class="med_tittle_cont">
                      <h1>Gallery</h1>
                      <ol class="breadcrumb">
                          <li><a href="/">Home</a>
                          </li>
                          <li>Gallery</li>
                      </ol>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<!-- med_tittle_section End -->
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
	                      <div class="page_post med_toppadder20">
	                        <nav aria-label="Page navigation example">
	                          <ul class="pagination justify-content-center">
	                            {{ $galleries->links("pagination::bootstrap-4") }}
	                          </ul>
	                        </nav>
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

@endsection