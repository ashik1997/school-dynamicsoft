@extends('admin.layouts.app')
@section('title', 'নতুন সেট পেমেন্ট')
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
	        <h1 class="m-0 text-dark">সেট পেমেন্ট</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">হোমে</a></li>
	          <li class="breadcrumb-item"><a href="{{route('set-payment-new')}}">সেট পেমেন্ট</a></li>
	          <li class="breadcrumb-item active">নতুন যুক্ত</li>
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
		    <form action="{{ route('set-payment-new') }}" method="post" enctype="multipart/form-data">
	    	@csrf
		      <div class="card card-primary">
		        <div class="card-header">
		          <h3 class="card-title">সেট পেমেন্টের তথ্য</h3>
		          <div class="card-tools">
		            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
		              <i class="fas fa-minus"></i></button>
		          </div>
		        </div>
		        <div class="card-body">
		        	<div class="row">
		        	  <div class="col-md-6">
		                <div class="form-group">
		                  <label for="purpose">উদ্দেশ্য</label>
		                  <input type="text" name="purpose" id="purpose" class="form-control" value="{{old('purpose')}}" placeholder="পেমেন্ট উদ্দেশ্য" required autofocus="true">
		                </div>
		              </div>
		              <div class="col-md-6">
		                <div class="form-group">
		                  <label for="amount">পরিমাণ</label>
		                  <input type="text" name="amount" id="amount" class="form-control" value="{{old('amount')}}" placeholder="পেমেন্ট পরিমাণ" required>
		                </div>
		              </div>
		              <div class="col-md-6">
						<div class="form-group">
							<label for="year">সাল</label>
							<select name="year" id="year" class="form-control"></select>
						</div>
		              </div>
		        	  <div class="col-md-6">
		                <div class="form-group">
		                  <label for="class_id">ক্লাস</label>
		                  <select name="class_id" id="class_id" class="form-control">
		                  	<option value="0">সিলেক্ট ক্লাস </option>
		                  	<option v-for="cls in classes" :value="cls.id">@{{cls.name}}</option>
		                  </select>
		                </div>
		              </div>
		              <!-- /.col -->
		        	</div>
		            <!-- /.row -->
		        </div>
		        <!-- /.card-body -->
		        <div class="card-footer">
		        	<input type="submit" class="btn btn-success btn-lg float-right" value="সংরক্ষণ">
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
	    	classes: {!!json_encode($classes)!!}
	    },
	    methods: {

	    }
	});
</script>
<script>
	let dateDropdown = document.getElementById('year'); 
	   
	let currentYear = new Date().getFullYear()+1;    
	let earliestYear = 1970;     
	while (currentYear >= earliestYear) {      
		let dateOption = document.createElement('option');          
		dateOption.text = currentYear;      
		dateOption.value = currentYear;        
		dateDropdown.add(dateOption);      
		currentYear -= 1;    
	}
</script>
@endsection