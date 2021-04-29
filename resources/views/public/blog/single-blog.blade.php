  @extends('public.layouts.app')
  @section('title','Blog details')
  @section('content')
  <!--med_tittle_section-->
<div class="med_tittle_section">
    <div class="med_img_overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="med_tittle_cont_wrapper">
                    <div class="med_tittle_cont">
                        <h1>Blog Single</h1>
                        <ol class="breadcrumb">
                            <li><a href="/">Home</a>
                            </li>
                            <li>Blog</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- med_tittle_section End -->
<!--blog category section start-->
<div class="blog_section med_toppadder100 med_bottompadder100">
    <div class="container">

        <div class="blog_category_main_wrapper">
            <div class="row">
                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
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
                                    <p>{{$blog->sub_title}}</p>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 med_toppadder50">
                            <div class="blog_single_txt">
                                <div class="blog_txt_body ">
                                  {!!$blog->description!!}
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 med_toppadder50">
                            <p>Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat consequat auctor.</p>
                            <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibhMorbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora.</p>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 med_toppadder50">
                            <div class='vuukle-powerbar'></div>
                            <div id='vuukle-comments'>
                            <div id='vuukle-emote'></div>
                            <div id='vuukle-newsfeed'></div>
                        </div>
                    </div>
                </div>
            </div>
            @include('public.blog.blog_sidebar')
        </div>
    </div>
</div>
<!--blog section end-->
<script>
  var VUUKLE_CONFIG = {
    apiKey: 'c5dbcce6-70ba-4b0b-839f-d6a1d978d1e9',
    articleId: '{{$blog->id}}',
  };
  // ⛔️ DON'T EDIT BELOW THIS LINE
  (function() {
    var d = document,
      s = d.createElement('script');
    s.src = 'https://cdn.vuukle.com/platform.js';
    (d.head || d.body).appendChild(s);
  })();
</script>
@endsection