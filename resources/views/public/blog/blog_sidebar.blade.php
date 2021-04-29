<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
  <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="contect_form_blog">
              <input type="text" placeholder="search here"><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
          </div>
      </div>
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="right_blog_category_wrapper right_blog_1">
              <h4 class="med_bottompadder10">recent post</h4>
              <img src="{{asset('frontend/')}}/images/line.png" alt="img" class="img-responsive">
              <div class="right_post_category_list_wrapper">
              	@foreach($recents as $key => $blog)
                  <div class="gc_footer_ln_main_wrapper">
                      <div class="gc_footer_ln_img_wrapper">
                          <img src="{{asset('frontend/')}}/images/blog/{{$blog->image}}" class="img-responsive" alt="" height="80" width="70" />
                      </div>
                      <div class="gc_footer_ln_cont_wrapper">
                          <h4><a href="{{route('single-blog',$blog->id)}}">{{$blog->title}}</a></h4>
                          <p>{{date('F d,Y', strtotime($blog->craeted_at))}}</p>
                      </div>
                  </div>
                  @endforeach
              </div>
          </div>
      </div>
  </div>
</div>