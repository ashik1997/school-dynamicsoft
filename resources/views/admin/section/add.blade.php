@extends('admin.layouts.app')
@section('title', 'নতুন শাখা যুক্ত করুন ')
@section('link')
<!-- vue -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.17/vue.js"></script>
<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('backend/')}}/plugins/fontawesome-free/css/all.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="{{asset('backend/')}}/ionicons/2.0.1/css/ionicons.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('backend/')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
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
	        <h1 class="m-0 text-dark">শাখা</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">হোমে</a></li>
	          <li class="breadcrumb-item"><a href="">শাখা</a></li>
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
	    	<form action="{{ route('section-add') }}" method="post" enctype="multipart/form-data">
    		@csrf
			    <div class="card card-primary">
			        <div class="card-header">
			          <h3 class="card-title">শাখা তথ্য</h3>
			          <div class="card-tools">
			            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
			              <i class="fas fa-minus"></i></button>
			          </div>
			        </div>
			        <div class="card-body">
			        	<div class="row">
			        	  <div class="col-md-6">
			                <div class="form-group">
			                  <label for="class_id">ক্লাস</label>
			                  <select v-model="class_id" name="class_id" id="class_id" class="form-control">
			                  	<option value="0">সিলেক্ট ক্লাস </option>
			                  	<option v-for="cls in classes" :value="cls.id">@{{cls.name}}</option>
			                  </select>
			                </div>
			              </div>
			              <div class="col-md-6">
			                <div class="form-group">
			                  <label for="section_name">শাখা নাম</label>
			                  <input type="text" name="section_name" id="section_name" v-model="section_name" class="form-control" value="{{old('section_name')}}" placeholder="শাখা নাম" required autofocus="true">
			                  <input type="hidden" name="section_id" v-model="section_id" id="section_id" class="form-control" value="{{old('section_id')}}">
			                </div>
			              </div>
			              <div class="col-md-6">
							<div class="form-group">
								<label for="year">সাল</label>
								<select name="year" id="year" class="form-control" v-model='year'></select>
							</div>
			              </div>
			              <!-- /.col -->
			        	</div>
			            <!-- /.row -->
			        </div>
			        <!-- /.card-body -->
			        <div class="card-footer">
			        	<input type="submit" class="btn btn-outline-success btn-lg float-right" v-model="action">
			    	</div>
			    </div>
			    <!-- /.card -->
		    </form>
	    </div>
	    <div class="col-md-6">
	      <div class="card card-secondary">
	        <div class="card-header">
	          <h3 class="card-title">শাখা তালিকা</h3>
	          <div class="card-tools">
	            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
	              <i class="fas fa-minus"></i></button>
	          </div>
	        </div>
	        <div class="card-body">
		        <div class="table-responsive">
		            <table id="example1" class="table table-bordered table-sm">
		              <thead>
		              <tr>
		                <th>#</th>
		                <th>ক্লাস</th>
		                <th>শাখা</th>
		                <th>অ্যাকশান</th>
		              </tr>
		              </thead>
		              <tbody>
		              @foreach($classes as $key => $class)
		              <tr>
		              	<td>{{$key+1}}</td>
		            	<td>{{$class->name}}</td>
		            	<td>
			            	<table class="table table-bordered text-center">
			            		<tbody>
				              	@foreach($class->sections as $ky => $section)
				              	<tr>
					                <td>{{$section->name}}</td>
					                <td>{{$section->year}}</td>
					                <td class="text-center">
					                  <div class="btn-group">
					                  <a class="btn btn-primary btn-flat btn-md fa fa-edit" href="#" @click= "editsection({{$section->id}})"></a><a class="btn btn-danger btn-flat btn-md fa fa-trash-alt" href="{{ route('section-delete',$section->id) }}"></a>
					                  </div>
					                </td>
					            </tr>
					            @endforeach
				            	</tbody>
			            	</table>
		            	</td>
		              </tr>
		              @endforeach
		              </tbody>
		              <tfoot>
		              <tr>
		                <th>#</th>
		                <th>ক্লাস</th>
		                <th>শাখা</th>
		                <th>অ্যাকশান</th>
		              </tr>
		              </tfoot>
		            </table>
		        </div>
	        </div>
	        <!-- /.card-body -->
	      </div>
	      <!-- /.card -->
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
<!-- DataTables -->
<script src="{{asset('backend/')}}/plugins/datatables/jquery.dataTables.js"></script>
<script src="{{asset('backend/')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('backend/')}}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('backend/')}}/dist/js/demo.js"></script>
<!-- Summernote -->
<script src="{{asset('backend/')}}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- page script -->
<script>
 $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
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
<script>
	var app = new Vue({
	    el: "#app",
	    data: {
	    	section_name: '',
	    	section_id: 0,
	    	class_id: 0,
	    	year: new Date().getFullYear(),
	    	action: 'সংরক্ষণ',
	    	classes: {!!json_encode($classes)!!}
	    },
	    methods: {
	    	editsection(id){
	        	axios.get('/admin/section/edit/'+id)
		        .then(function (response) {
			        app.section_name = response.data.name;
			        app.section_id = response.data.id;
			        app.class_id = response.data.class_id;
			        app.year = response.data.year;
			        app.action = 'আপডেট';
			    });
	    	},

	    }
	});
</script> 
@endsection