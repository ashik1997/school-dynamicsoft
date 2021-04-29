@extends('admin.layouts.app')
@section('title', 'খরচ সম্পাদনা')
@section('link')
<!-- vue -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.17/vue.js"></script>
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
	        <h1 class="m-0 text-dark">খরচ</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">হোমে</a></li>
	          <li class="breadcrumb-item"><a href="{{route('expense-new')}}">খরচ</a></li>
	          <li class="breadcrumb-item active"> সম্পাদনা</li>
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
	<div class="row">
	    <div class="col-md-6">
		    <form action="{{ route('expense-edit',$expense->id) }}" method="post" enctype="multipart/form-data">
	    	@csrf
		      <div class="card card-primary">
		        <div class="card-header">
		          <h3 class="card-title">খরচের তথ্য</h3>
		          <div class="card-tools">
		            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
		              <i class="fas fa-minus"></i></button>
		          </div>
		        </div>
		        <div class="card-body">
		        	<div class="row">
		        	  <div class="col-md-6">
		                <div class="form-group">
		                  <label for="purpose">খরচের উদ্দেশ্য</label>
		                  <input type="text" name="purpose" id="purpose" class="form-control" value="{{$expense->purpose}}" placeholder="খরচের উদ্দেশ্য" required autofocus="true">
		                </div>
		              </div>
		              <div class="col-md-6">
		                <div class="form-group">
		                  <label for="amount">খরচের পরিমাণ</label>
		                  <input type="number" name="amount" id="amount" class="form-control" value="{{$expense->amount}}" placeholder="খরচের পরিমাণ" required>
		                </div>
		              </div>
		        	  <div class="col-md-6">
		                <div class="form-group">
		                  <label for="date">খরচের তারিখ</label>
		                  <input type="date" name="date" id="date" value="{{$expense->date}}" class="form-control" required>
		                </div>
		              </div>
		              <!-- /.col -->
		        	</div>
		            <!-- /.row -->
		        </div>
		        <!-- /.card-body -->
		        <div class="card-footer">
		        	<button type="submit" class="btn btn-success btn-lg float-right">আপডেট</button>
		    	</div>
		      </div>
		      <!-- /.card -->
		     </form>
	    </div>
	</div>
</section>
<!-- /.content -->
@endsection
@section('script')
<!-- vue -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.17/vue.js"></script>
<!-- axios -->
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
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
<!-- page script -->
<script>
	var app = new Vue({
	    el: "#app",
	    data: {
	    },
	    methods: {

	    }
	});
</script>
@endsection