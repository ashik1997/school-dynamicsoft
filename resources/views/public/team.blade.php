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
                    <div class="row">
                        
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
                          
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              <div class="page_post med_toppadder20">
                <nav aria-label="Page navigation example">
                  <ul class="pagination justify-content-center">
                    {{ $teams->links("pagination::bootstrap-4") }}
                  </ul>
                </nav>
              </div>
            </div>
        </div>
    </div>
</div>
<!--team wrapper end-->

@endsection