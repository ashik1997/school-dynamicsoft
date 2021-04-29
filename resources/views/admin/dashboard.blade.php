@extends('admin.layouts.app')
@section('title', 'Dashboard')
@section('link')
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="{{asset('backend/')}}/plugins/fontawesome-free/css/all.min.css">
<!-- IonIcons -->
<link rel="stylesheet" href="{{asset('backend/')}}/ionicons/2.0.1/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="{{asset('backend/')}}/dist/css/adminlte.min.css">
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
@endsection
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
	  <div class="row mb-2">
	    <div class="col-sm-6">
	      <h1 class="m-0 text-dark"><i class="fa fa-dashboard"></i><small>ড্যাশবোর্ড</small></h1>
	    </div><!-- /.col -->
	    <div class="col-sm-6">
	      <ol class="breadcrumb float-sm-right">
	        <li class="breadcrumb-item"><a href="#">হেল্প</a></li>
	        <li class="breadcrumb-item active"><a href="#">01731002123</a></li>
	      </ol>
	    </div><!-- /.col -->
	  </div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-3">
			    <div class="card">
			        <div class="card-header">
			          <h5 class="card-title"><i class="fa fa-book"></i> আপডেট</h5>
			        </div>
			        <div class="card-body">
			          <div class="row">
			            <div class="col-lg-12">
			              @if (file_exists('frontend/images/logo/'.App\Models\SiteInfo::pluck('header_logo')[0]))
			              <img src="{{asset('frontend/')}}/images/logo/{{ App\Models\SiteInfo::pluck('header_logo')[0] }}" width="100%" alt="">
			              @endif
			              <h5 class="text-center"><strong>{{App\Models\SiteInfo::pluck('site_name')[0]}}</strong></h5>
			            </div>
			          </div>
			        </div>
			    </div>
			</div>
			<!-- /.col-md-3 -->
			<div class="col-lg-9">
				<div class="row">
					<div class="col-lg-4">
						<div class="card card-primary card-outline">
						    <div class="card-header">
						      <h5 class="card-title m-0"><i class="fa fa-users float-right"></i></h5>
						    </div>
						    <div class="card-body">
							    <ul>
					        		<li><a href="{{route('student-new')}}" class="fa fa-edit">এডমিশন</a></li>
					        		<li><a href="{{route('student-list')}}" class="fa fa-users">ছাত্র-ছাত্রী</a></li>
					        		<li><a href="{{route('guardian-list')}}" class="fa fa-user">অভিভাবক</a></li>
					        		<li><a href="" class="fa fa-print">তালিকা প্রিন্ট</a></li>
					        	</ul>
						    </div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="card card-primary card-outline">
						    <div class="card-header">
						      <h5 class="card-title m-0"><i class="fa fa-user float-right"></i></h5>
						    </div>
						    <div class="card-body">
							    <ul>
					        		<li><a href="{{route('employee-new')}}" class="fa fa-edit">নতুন সংযোজন</a></li>
					        		<li><a href="{{route('teacher-list')}}" class="fa fa-users">শিক্ষক তালিকা</a></li>
					        		<li><a href="{{route('employee-list')}}" class="fa fa-users">কর্মচারী তালিকা</a></li>
					        		<li><a href="" class="fa fa-print">প্রিন্ট শিক্ষক-কর্মচারী</a></li>
					        	</ul>
						    </div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="card card-primary card-outline">
						    <div class="card-header">
						      <h5 class="card-title m-0"><i class="fa fa-user float-right"></i></h5>
						    </div>
						    <div class="card-body">
							    <ul>
					        		<li><a href="" class="fa fa-edit">শিক্ষক-কর্মচারী</a></li>
					        		<li><a href="" class="fa fa-edit">ছাত্র-ছাত্রী</a></li>
					        		<li><a href="" class="fa fa-print">শিক্ষক-কর্মচারী</a></li>
					        		<li><a href="" class="fa fa-print">ছাত্র-ছাত্রী</a></li>
					        	</ul>
						    </div>
						</div>
					</div>
				</div>
			</div>
			<!-- /.col-md-9 -->
		</div>
		<!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection
@section('script')
<!-- jQuery -->
<script src="{{asset('backend/')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="{{asset('backend/')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="{{asset('backend/')}}/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{asset('backend/')}}/plugins/chart.js/Chart.min.js"></script>
<script src="{{asset('backend/')}}/dist/js/demo.js"></script>
<script src="{{asset('backend/')}}/dist/js/pages/dashboard3.js"></script>
@endsection