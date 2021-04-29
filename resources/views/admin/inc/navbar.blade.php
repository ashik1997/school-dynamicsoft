<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-light navbar-dark">
  <div class="container-fluid">
    <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse order-3" id="navbarCollapse">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="{{route('dashboard')}}" class="navbar-brand">
            <span class="brand-text font-weight-light"><i class="fa fa-book"></i>{{App\Models\SiteInfo::pluck('site_name')[0]}}</span>
          </a>
    
        </li>
        <li class="nav-item">
          <a href="{{route('dashboard')}}" class="nav-link"><i class="fa fa-home"></i></a>
        </li>
        <li class="nav-item dropdown">
          <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">ছাত্র-ছাত্রী</a>
          <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
            <li><a href="{{route('student-new')}}" class="dropdown-item">এডমিশন</a></li>
            <li><a href="{{route('student-list')}}" class="dropdown-item">ছাত্র-ছাত্রী</a></li>
            <li><a href="{{route('guardian-list')}}" class="dropdown-item">অভিভাবক</a></li>
            <li><a href="{{route('class-add')}}" class="dropdown-item">ক্লাস যুক্ত করুন</a></li>
            <li><a href="{{route('section-add')}}" class="dropdown-item">শাখা যুক্ত করুন</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a id="dropdownSubMenu2" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">শিক্ষক-কর্মচারী</a>
          <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
            <li><a href="{{route('employee-new')}}" class="dropdown-item">নতুন সংযোজন</a></li>
            <li><a href="{{route('teacher-list')}}" class="dropdown-item">শিক্ষক</a></li>
            <li><a href="{{route('employee-list')}}" class="dropdown-item">কর্মচারী</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a id="dropdownSubMenu3" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">উপস্থিতি</a>
          <ul aria-labelledby="dropdownSubMenu3" class="dropdown-menu border-0 shadow">
            <li><a href="#" class="dropdown-item">Some action </a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a id="dropdownSubMenu5" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">ফলাফল</a>
          <ul aria-labelledby="dropdownSubMenu5" class="dropdown-menu border-0 shadow">
            <li><a href="{{route('exam-add')}}" class="dropdown-item">পরীক্ষা যুক্ত করুন</a></li>
            <li><a href="{{route('mark-distribution-list')}}" class="dropdown-item">মার্ক ডিস্ট্রিবিউশন</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a id="dropdownSubMenu6" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">হিসাব</a>
          <ul aria-labelledby="dropdownSubMenu6" class="dropdown-menu border-0 shadow">
            <li><a href="{{route('expense-new')}}" class="dropdown-item">খরচ যুক্ত করুন</a></li>
            <li><a href="{{route('expense-list')}}" class="dropdown-item">খরচের তালিকা</a></li>
            <li><a href="{{route('salary-payment-new')}}" class="dropdown-item">বেতন প্রদান</a></li>
            <li><a href="{{route('salary-payment-list')}}" class="dropdown-item">বেতন তালিকা</a></li>
            <li><a href="{{route('set-payment-add')}}" class="dropdown-item">সেট পেমেন্ট</a></li>
            <li><a href="{{route('set-payment-list')}}" class="dropdown-item">সেট পেমেন্ট তালিকা</a></li>
            <li><a href="{{route('get-payment-new')}}" class="dropdown-item">গেট পেমেন্ট</a></li>
            <li><a href="{{route('get-payment-list')}}" class="dropdown-item">গেট পেমেন্ট তালিকা</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a id="dropdownSubMenu6" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">লাইব্রেরী</a>
          <ul aria-labelledby="dropdownSubMenu6" class="dropdown-menu border-0 shadow">
            <li><a href="{{route('subject-add')}}" class="dropdown-item">সাবজেক্ট যুক্ত করুন</a></li>
            <li><a href="{{route('group-add')}}" class="dropdown-item">গ্রুপ যুক্ত করুন</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a id="dropdownSubMenu7" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">পাবলিশার</a>
          <ul aria-labelledby="dropdownSubMenu7" class="dropdown-menu border-0 shadow">
            <li><a href="#" class="dropdown-item">Some action </a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a id="dropdownSubMenu8" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">ইনভেন্টরি</a>
          <ul aria-labelledby="dropdownSubMenu8" class="dropdown-menu border-0 shadow">
            <li><a href="#" class="dropdown-item">Some action </a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a id="dropdownSubMenu8" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">ওয়েবসাইট সেটিং</a>
          <ul aria-labelledby="dropdownSubMenu8" class="dropdown-menu border-0 shadow">
            <li><a href="{{route('blog-list')}}" class="dropdown-item">ব্লগ </a></li>
            <li><a href="{{route('gallery-list')}}" class="dropdown-item">গ্যালারি </a></li>
            <li><a href="{{route('slider-list')}}" class="dropdown-item">স্লাইডার </a></li>
            <li><a href="{{route('social-media-list')}}" class="dropdown-item">সোশ্যাল মিডিয়া</a></li>
            <li><a href="{{route('contact-list')}}" class="dropdown-item">কন্টাক্ট লিস্ট</a></li>
            <li><a href="{{route('about-info')}}" class="dropdown-item">এবাউট তথ্য</a></li>
            <li><a href="{{route('site-info')}}" class="dropdown-item">ওয়েবসাইটের তথ্য</a></li>
          </ul>
        </li>
      </ul>
    </div>

    <!-- Right navbar links -->
    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
        </a>
      </li>
    </ul>
  </div>
</nav>
<!-- /.navbar -->