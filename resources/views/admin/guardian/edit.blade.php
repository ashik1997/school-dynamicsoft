@extends('admin.layouts.app')
@section('title', 'অভিভাবক সম্পাদনা করুন')
@section('link')
<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('backend/')}}/plugins/fontawesome-free/css/all.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="{{asset('backend/')}}/ionicons/2.0.1/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="{{asset('backend/')}}/dist/css/adminlte.min.css">
<!-- summernote -->
<link rel="stylesheet" href="{{asset('backend/')}}/plugins/summernote/summernote-bs4.css">
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.js"></script>
@endsection
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">অভিভাবক</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">হোমে</a></li>
	          <li class="breadcrumb-item"><a href="{{route('guardian-list')}}">অভিভাবক</a></li>
	          <li class="breadcrumb-item active">সম্পাদনা করুন</li>
	        </ol>
	      </div><!-- /.col -->
	    </div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
	@if ($errors->any())
    <div class="alert alert-danger alert-dismissible" id="myAlert">
      <a href="" class="close">&times;</a>
      <ul>
      @foreach ($errors->all() as $error)
        <li>
        <strong>Oh sanp!</strong> {{ $error }}
        </li>
      @endforeach
      </ul>
    </div>
    @endif
    <form action="{{ route('guardian-update',$guardian->id) }}" method="post" enctype="multipart/form-data">
    	@csrf
	  <div class="row">
	    <div class="col-md-8">
	      <div class="card card-secondary">
	        <div class="card-header">
	          <h3 class="card-title">অভিভাবকদের তথ্য</h3>
	          <div class="card-tools">
	            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
	              <i class="fas fa-minus"></i></button>
	          </div>
	        </div>
	        <div class="card-body">
	        	<h5><i class="fas fa-edit" aria-hidden="true"></i> পিতা / অভিভাবক</h5>
		        <hr>
	        	<div class="row">
	        	  <div class="col-md-6">
	                <div class="form-group">
	                  <label for="student_id">ছাত্ররের আই ডি</label>
	                  <input type="text" name="student_id" id="student_id" class="form-control" value="{{$guardian->student_id}}" disabled>
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                  <label for="f_name">নাম</label>
	                  <input type="text" name="f_name" id="f_name" class="form-control" value="{{$guardian->father_name}}" placeholder="নাম" >
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                  <label for="f_phone">ফোন</label>
	                  <input type="tel" name="f_phone" id="f_phone" class="form-control" value="{{$guardian->father_phone}}" placeholder="ফোন">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                  <label for="f_email">ইমেইল</label>
	                  <input type="email" name="f_email" id="f_email" class="form-control" value="{{$guardian->father_email}}" placeholder="ইমেইল">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                  <label for="f_occupation">পেশা</label>
	                  <input type="text" name="f_occupation" id="f_occupation" class="form-control" value="{{$guardian->father_occupation}}" placeholder="পেশা">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                  <label for="f_address">ঠিকানা</label>
	                  <textarea name="f_address" id="f_address" class="" placeholder="ঠিকানা"
	                  style="width: 100%; height: 50px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$guardian->father_address}}</textarea>
	                </div>
	                <!-- /.form-group -->
	              </div>
	              <!-- /.col -->
	        	</div>
	            <!-- /.row -->
	            <h5><i class="fas fa-edit" aria-hidden="true"></i> মা / অভিভাবক</h5>
		        <hr>
	        	<div class="row">
	              <div class="col-md-6">
	                <div class="form-group">
	                  <label for="m_name">নাম</label>
	                  <input type="text" value="{{$guardian->mother_name}}" name="m_name" id="m_name" class="form-control" placeholder="নাম" >
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                  <label for="m_phone">ফোন</label>
	                  <input type="tel" name="m_phone" id="m_phone" class="form-control" value="{{$guardian->mother_phone}}" placeholder="ফোন">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                  <label for="m_email">ইমেইল</label>
	                  <input type="email" name="m_email" id="m_email" class="form-control" value="{{$guardian->mother_email}}" placeholder="ইমেইল">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                  <label for="m_occupation">পেশা</label>
	                  <input type="text" name="m_occupation" id="m_occupation" class="form-control" value="{{$guardian->mother_occupation}}" placeholder="পেশা">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                  <label for="m_address">ঠিকানা</label>
	                  <textarea name="m_address" id="m_address" class="" placeholder="ঠিকানা"
	                  style="width: 100%; height: 50px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$guardian->mother_address}}</textarea>
	                </div>
	                <!-- /.form-group -->
	              </div>
	              <!-- /.col -->
	        	</div>
	            <!-- /.row -->
	        </div>
	        <!-- /.card-body -->
	        <div class="card-footer">
				<button type="submit" class="btn btn-outline-success btn-lg float-right">আপডেট</button>
			</div>
	      </div>
	      <!-- /.card -->
	    </div>
	  </div>
	</form>
</section>
<!-- /.content -->
@endsection
@section('script')
<!-- jQuery -->
<script src="{{asset('backend/')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('backend/')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('backend/')}}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('backend/')}}/dist/js/demo.js"></script>
<!-- Summernote -->
<script src="{{asset('backend/')}}/plugins/summernote/summernote-bs4.min.js"></script>
 
@endsection