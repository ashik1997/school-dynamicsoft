@extends('admin.layouts.app')
@section('title', 'Slider edit')
@section('link')
<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('backend/')}}/plugins/fontawesome-free/css/all.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="{{asset('backend/')}}/code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- daterange picker -->
<link rel="stylesheet" href="{{asset('backend/')}}/plugins/daterangepicker/daterangepicker.css">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="{{asset('backend/')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- Bootstrap Color Picker -->
<link rel="stylesheet" href="{{asset('backend/')}}/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
<!-- Tempusdominus Bbootstrap 4 -->
<link rel="stylesheet" href="{{asset('backend/')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('backend/')}}/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="{{asset('backend/')}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- Bootstrap4 Duallistbox -->
<link rel="stylesheet" href="{{asset('backend/')}}/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
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
	        <h1 class="m-0 text-dark">Slider</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="#">Home</a></li>
	          <li class="breadcrumb-item"><a href="#">Slider</a></li>
	          <li class="breadcrumb-item active">Edit</li>
	        </ol>
	      </div><!-- /.col -->
	    </div><!-- /.row -->
	  </div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
        	<div class="card-header">
	            <h3 class="card-title">Edit Slider</h3>
        	</div>
	        <!-- /.card-header -->
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
	        <form action="{{ route('slider-edit',$slider->id) }}" method="post" enctype="multipart/form-data">
	        	@csrf
		        <div class="card-body">
		        	<div class="row">
		              <div class="col-md-6">
		                <div class="form-group">
		                  <label for="title">Title</label>
		                  <input type="text" name="title" id="title" class="form-control" value="{{$slider->title}}" placeholder="Enter title">
		                </div>
		              </div>
		              <div class="col-md-6">
		                <div class="form-group">
		                  <label for="sub_title">Sub-title</label>
		                  <input type="text" name="sub_title" id="sub_title" class="form-control" value="{{$slider->sub_title}}" placeholder="Enter sub-title">
		                </div>
		              </div>
		              <div class="col-md-6">
		                <div class="form-group">
		                  <label for="description">Description</label>
		                  <textarea name="description" id="description" class="form-control" placeholder="Enter description">{{$slider->description}}</textarea>
		                </div>
		                <!-- /.form-group -->
		              </div>
		              <div class="col-12 col-sm-6">
		                <div class="form-group">
		                  <label>Image (Dimensions: 1920x969)</label>
		                  <input type="file" name="image" id="image" class="form-control-file" >
		                  <br>
		                  <img src="{{asset('frontend/')}}/images/slider/{{ $slider->image }}" height="242" width="480" alt="">
		                </div>
		                <!-- /.form-group -->
		              </div>
		              <!-- /.col -->
		        	</div>
		            <!-- /.row -->
		        </div>
		        <!-- /.card-body -->
	        	<div class="card-footer">
	        		<button type="submit" name="save" class="btn btn-outline-success btn-lg">Save</button>
	        	</div>
	        </form>
        </div>
        <!-- /.card -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content -->
@endsection
@section('script')
<!-- jQuery -->
<script src="{{asset('backend/')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('backend/')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="{{asset('backend/')}}/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{asset('backend/')}}/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="{{asset('backend/')}}/plugins/moment/moment.min.js"></script>
<script src="{{asset('backend/')}}/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->
<script src="{{asset('backend/')}}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="{{asset('backend/')}}/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('backend/')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="{{asset('backend/')}}/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('backend/')}}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('backend/')}}/dist/js/demo.js"></script>
<!-- Page script -->
<script>
</script>
@endsection