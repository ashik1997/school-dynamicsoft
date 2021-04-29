@extends('public.layouts.app')
@section('title','Blog')
@section('content')
<!--med_tittle_section-->
<div class="med_tittle_section">
  <div class="med_img_overlay"></div>
  <div class="container">
      <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              <div class="med_tittle_cont_wrapper">
                  <div class="med_tittle_cont">
                      <h1>Blog</h1>
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
                    @foreach($blogs as $key => $blog)
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
                                  <a href="{{route('single-blog',$blog->id)}}">Read More <i class="fa fa-long-arrow-right"></i></a>
                              </div>
                          </div>
                      </div>
                    @endforeach
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                      <div class="page_post med_toppadder20">
                        <nav aria-label="Page navigation example">
                          <ul class="pagination justify-content-center">
                            {{ $blogs->links("pagination::bootstrap-4") }}
                          </ul>
                        </nav>
                      </div>
                    </div>
                  </div>
              </div>
              @include('public.blog.blog_sidebar')
          </div>
      </div>
  </div>
</div>
<!--blog category section end-->

@endsection