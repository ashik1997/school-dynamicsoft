@extends('admin.layouts.app')
@section('title', 'নতুন মার্ক ডিস্ট্রিবিউশন যুক্ত করুন ')
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
	        <h1 class="m-0 text-dark">মার্ক ডিস্ট্রিবিউশন</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">হোমে</a></li>
	          <li class="breadcrumb-item"><a href="{{route('mark-distribution-list')}}">তালিকা</a></li>
	          <li class="breadcrumb-item active"><a href="{{route('mark-distribution-add')}}">নতুন যুক্ত</a></li>
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
    <form action="{{ route('mark-distribution-add') }}" method="post" enctype="multipart/form-data">
    	@csrf
	  <div class="row">
	    <div class="col-md-7">
	      <div class="card card-primary">
	        <div class="card-header">
	          <h3 class="card-title">মার্ক ডিস্ট্রিবিউশন তথ্য</h3>

	          <div class="card-tools">
	            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
	              <i class="fas fa-minus"></i></button>
	          </div>
	        </div>
	        <div class="card-body">
	        	<div class="row">
	            	<div class="col-md-4">
		                <div class="form-group">
		                  <label for="class_id">ক্লাস</label>
		                  <select name="class_id" id="class_id" class="form-control" @change='getClassSubject();getClassExam()' v-model="class_id">
		                  	<option value="0">সিলেক্ট ক্লাস </option>
		                  	<option v-for="cls in classes" :value="cls.id">@{{cls.name}}</option>
		                  </select>
		                </div>
		            </div>
		            <div class="col-md-4">
		                <div class="form-group">
		                  <label for="subject_id">সাবজেক্ট</label>
		                  <select name="subject_id" id="subject_id" class="form-control" @change='' v-model="subject_id">
		                  	<option value="0">সিলেক্ট সাবজেক্ট </option>
		                  	<option v-for="subject in subjects" :value="subject.id">@{{subject.name}}</option>
		                  </select>
		                </div>
		            </div>
	              <!-- /.col -->
	        	</div>
	            <!-- /.row -->
	        </div>
	        <!-- /.card-body -->
	      </div>
	      <!-- /.card -->
	    </div>
	    <div class="col-md-5">
	      <div class="card card-primary">
	        <div class="card-header">
	          <h3 class="card-title">মার্ক ডিস্ট্রিবিউশন</h3>
	          <div class="card-tools">
	            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
	              <i class="fas fa-minus"></i></button>
	          </div>
	        </div>
	        <div class="card-body">
	        	<div class="row" v-for="(row,k) in rows" :key="k">
	        	   <div class="col-md-6">
					<div class="form-group">
						<label for="name">নাম</label>
						<input type="text" name="name[]" id="name" class="form-control" value="{{old('name')}}" placeholder="নাম">
					</div>
	              </div>
	              <div class="col-md-6">
					<div class="form-group">
						<label for="mark">মার্ক</label>
						<div class="input-group mb-3">
						<input type="text" name="mark[]" id="mark" class="form-control" value="{{old('mark')}}" placeholder="মার্ক">
						<div class="input-group-append" v-on:click="removeElement(row);" style="cursor: pointer" title="remove">
	                    	<span class="input-group-text text-danger"><i class="fas fa-minus"></i></span>
		                </div>
						</div>
						
					</div>
	              </div>
	              <!-- /.col -->
	        	</div>
	        	<a class="btn btn-info" @click="addRow"><i class="fas fa-plus"></i></a>
	        </div>
	        <!-- /.card-body -->
	      </div>
	      <!-- /.card -->
	    </div>
	  </div>
	  <div class="row">
	    <div class="col-12">
	    	<div class="card-footer">
	    		<button type="submit" class="btn btn-success btn-lg float-right">সংরক্ষণ</button>
	    	</div>
	    </div>
	  </div>
	</form>
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
<script>
	var app = new Vue({
	    el: "#app",
	    data: {
	        rows: [
                {}
            ],
            classes: '',
            subjects: '',
            class_id: 0,
            subject_id: 0,
	    },
	    methods: {
	        addRow: function () {
                this.rows.push({});
            },
            removeElement: function (row) {
                var index = this.rows.indexOf(row);
                this.rows.splice(index, 1);
            },
            getClass: function(){
		      axios.get('/admin/class/list')
		      .then(function (response) {
		        app.classes = response.data;
		      }); 
		    },
		    getClassSubject: function(){
		      axios.get('/admin/subject/class-subject', {
		         params: {
		           class_id: this.class_id,
		         }
		      })
		      .then(function (response) {
		        app.subjects = response.data;
		        app.subject_id = 0;
		      }); 
		    },
	    },
	    beforeMount(){
	    	this.getClass();
	    	this.getClassSubject();
	    }
	});
</script> 
@endsection