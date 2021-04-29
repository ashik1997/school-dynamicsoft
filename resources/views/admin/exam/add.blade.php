@extends('admin.layouts.app')
@section('title', 'নতুন পরীক্ষা যুক্ত করুন ')
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
	        <h1 class="m-0 text-dark">পরীক্ষা</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">হোমে</a></li>
	          <li class="breadcrumb-item"><a href="">পরীক্ষা</a></li>
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
		    <form action="{{ route('exam-add') }}" method="post" enctype="multipart/form-data">
	    	@csrf
		      <div class="card card-primary">
		        <div class="card-header">
		          <h3 class="card-title">পরীক্ষার তথ্য</h3>
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
		                  <label for="exam_name">পরীক্ষার নাম</label>
		                  <input type="text" name="exam_name" id="exam_name" v-model="exam_name" class="form-control" value="{{old('exam_name')}}" placeholder="পরীক্ষার নাম" required autofocus="true">
		                  <input type="hidden" name="exam_id" v-model="exam_id" id="exam_id" class="form-control" value="{{old('exam_id')}}">
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
	          <h3 class="card-title">পরীক্ষার তালিকা</h3>
	          <div class="card-tools">
	            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
	              <i class="fas fa-minus"></i></button>
	          </div>
	        </div>
	        <div class="card-body">
	        	<div class="table-responsive">
            <table id="example1" class="table table-bordered table-sm table-striped">
              <thead>
              <tr>
                <th>#</th>
                <th>ক্লাস </th>
                <th>পরীক্ষার নাম</th>
                <th>অ্যাকশান</th>
              </tr>
              </thead>
              <tbody>
              @foreach($exams as $key => $exam)
              <tr>
                <td>{{$key+1}}</td>
                <td>@if(!empty($exam->cls->name)){{$exam->cls->name}}@endif</td>
                <td>{{$exam->name}}</td>
                <td>
                  <div class="btn-group">
                  <a class="btn btn-primary btn-flat btn-md fa fa-edit" href="#" @click= "editexam({{$exam->id}})"></a><a class="btn btn-danger btn-flat btn-md fa fa-trash-alt" href="{{ route('exam-delete',$exam->id) }}"></a>
                  </div>
                </td>
              </tr>
              @endforeach
              </tbody>
              <tfoot>
              <tr>
                <th>#</th>
                <th>ক্লাস </th>
                <th>পরীক্ষার নাম</th>
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
	var app = new Vue({
	    el: "#app",
	    data: {
	    	exam_name: '',
	    	exam_id: 0,
	    	class_id: 0,
	    	action: 'সংরক্ষণ',
	    	classes: {!!json_encode($classes)!!}
	    },
	    methods: {
	    	editexam(id){
	        	axios.get('/admin/exam/edit/'+id)
		        .then(function (response) {
			        app.exam_name = response.data.name;
			        app.exam_id = response.data.id;
			        app.class_id = response.data.class_id;
			        app.action = 'আপডেট';
			    });
	    	},

	    }
	});
</script> 
@endsection