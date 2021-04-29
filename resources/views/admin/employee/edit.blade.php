@extends('admin.layouts.app')
@section('title', 'শিক্ষক-কর্মচারী সম্পাদনা করুন')
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
	        <h1 class="m-0 text-dark">শিক্ষক-কর্মচারী</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">হোমে</a></li>
	          <li class="breadcrumb-item">
	          	@if($employee->employee_type=='employee') <a href="{{route('employee-list')}}">কর্মচারী</a>@elseif($employee->employee_type=='teacher')<a href="{{route('teacher-list')}}">শিক্ষক</a> @endif
	          </li>
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
    <form action="{{ route('employee-update',$employee->id) }}" method="post" enctype="multipart/form-data">
    	@csrf
	  <div class="row">
	    <div class="col-md-6">
	      <div class="card card-primary">
	        <div class="card-header">
	          <h3 class="card-title">শিক্ষক-কর্মচারী তথ্য</h3>

	          <div class="card-tools">
	            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
	              <i class="fas fa-minus"></i></button>
	          </div>
	        </div>
	        <div class="card-body">
	        	<div class="row">
	              <div class="col-md-6">
	                <div class="form-group">
	                  <label for="name">নাম</label>
	                  <input type="text" name="name" id="name" class="form-control" value="{{$employee->name}}" placeholder="নাম" required autofocus>
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                  <label for="phone">ফোন</label>
	                  <input type="tel"  name="phone" id="phone" class="form-control" value="{{$employee->phone}}" placeholder="ফোন">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                  <label for="email">ইমেল</label>
	                  <input type="email" name="email" id="email" class="form-control" value="{{$employee->email}}" placeholder="ইমেল">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                  <label for="dob">জন্ম তারিখ</label>
	                  <input type="date" name="dob" id="dob" class="form-control" value="{{$employee->dob}}" placeholder="জন্ম তারিখ">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                  <label for="blood_group">রক্তের গ্রুপ</label>
	                  <input type="text" name="blood_group" id="blood_group" class="form-control" value="{{$employee->blood_group}}" placeholder="রক্তের গ্রুপ">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="gender">লিঙ্গ</label>
	                	<br>
						<label class="radio-inline">
						<input type="radio" name="gender" @if($employee->gender=='পুরুষ'){{ ('checked') }} @endif value="পুরুষ">পুরুষ 
						</label>
						<label class="radio-inline">
						<input type="radio" name="gender" @if($employee->gender=='মহিলা'){{ ('checked') }} @endif value="মহিলা">মহিলা 
						</label>
						<label class="radio-inline">
						<input type="radio" name="gender" @if($employee->gender=='অন্যান্য'){{ ('checked') }} @endif value="অন্যান্য">অন্যান্য 
						</label>
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                  <label for="nid">এন.আই.ডি নম্বর</label>
	                  <input type="text" name="nid" id="nid" class="form-control" value="{{$employee->nid}}" placeholder="এন.আই.ডি নম্বর">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                  <label for="addresss">ঠিকানা</label>
	                  <textarea name="address" id="address" class="" placeholder="ঠিকানা"
	                  style="width: 100%; height: 60px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$employee->address}}</textarea>
	                </div>
	              </div>

	              <div class="col-md-6">
	                <div class="form-group">
	                  <label for="details">বিস্তারিত</label>
	                  <textarea name="details" id="details" class="" placeholder="বিস্তারিত"
	                  style="width: 100%; height: 60px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$employee->details}}</textarea>
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                  <label for="image">ছবি (আকার: ৪৫০x৬০০)</label>
	                  <input type="file" name="image" id="image"  @change="photo($event)" class="form-control-file" >
	                  <br>
	                  <img :src="form.image" alt="" width="175" height="200">
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
	    <div class="col-md-6">
	      <div class="card card-primary">
	        <div class="card-header">
	          <h3 class="card-title">স্কুলের তথ্য</h3>
	          <div class="card-tools">
	            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
	              <i class="fas fa-minus"></i></button>
	          </div>
	        </div>
	        <div class="card-body">
	        	<div class="row">
	        		<div class="col-md-6">
						<div class="form-group">
							<label for="employee_type">কর্মচারী ধরন</label>
							<select class="form-control" name="employee_type" id="employee_type"> 
								<option value="">সিলেক্ট করুন</option>
								<option value="employee" @if($employee->employee_type=='employee') {{('selected')}} @endif>সাধারণ কর্মচারী</option>
								<option value="teacher" @if($employee->employee_type=='teacher') {{('selected')}} @endif>শিক্ষক</option>
							</select>
					  </div>
	              </div>
	        	   <div class="col-md-6">
					<div class="form-group">
						<label for="join_date">যোগদানের তারিখ</label>
						<input type="date" name="join_date" id="join_date" class="form-control" value="{{$employee->join_date}}" placeholder="যোগদানের তারিখ">
					</div>
	              </div>
	              <div class="col-md-6">
					<div class="form-group">
						<label for="resign_date">পদত্যাগের তারিখ</label>
						<input type="date" name="resign_date" id="resign_date" class="form-control" value="{{$employee->resign_date}}" placeholder="পদত্যাগের তারিখ">
					</div>
	              </div>
	              
	              <div class="col-md-6">
	                <div class="form-group">
	                  <label for="position">অবস্থান</label>
	                  <input type="text" name="position" id="position" class="form-control" value="{{$employee->position}}" placeholder="অবস্থান">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                  <label for="salary">বেতন</label>
	                  <input type="number" name="salary" id="salary" class="form-control" value="{{$employee->salary}}" placeholder="বেতন">
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
	    <div class="col-md-12">
	      <div class="card card-primary">
	        <div class="card-header">
	          <h3 class="card-title">শিক্ষাগত অভিজ্ঞতা</h3>
	          <div class="card-tools">
	            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
	              <i class="fas fa-minus"></i></button>
	          </div>
	        </div>
	        <div class="card-body">
	        	<div class="row" v-for="(row,k) in rows" :key="k">
	        	   <div class="col-md-4">
					<div class="form-group">
						<label for="exam_name">পরীক্ষার নাম</label>
						<input type="text" name="exam_name[]" id="exam_name" class="form-control" :value="row.exam_name" placeholder="পরীক্ষার নাম">
					</div>
	              </div>
	              <div class="col-md-4">
					<div class="form-group">
						<label for="group_subject">সাবজেক্ট / গ্রুপ</label>
						<input type="text" name="group_subject[]" id="group_subject" class="form-control" :value="row.group_subject" placeholder="সাবজেক্ট / গ্রুপ">
					</div>
	              </div>
	              
	              <div class="col-md-4">
	                <div class="form-group">
	                  <label for="institute ">প্রতিষ্ঠানের নাম</label>
	                  <input type="text" name="institute[]" id="institute " class="form-control" :value="row.institute" placeholder="প্রতিষ্ঠানের নাম">
	                </div>
	              </div>
	              <div class="col-md-4">
	                <div class="form-group">
	                  <label for="result">রেজাল্ট </label>
	                  <input type="text" name="result[]" id="result" class="form-control" :value="row.result" placeholder="রেজাল্ট">
	                </div>
	              </div>
	              <div class="col-md-4">
	                <div class="form-group">
	                  <label for="pass_year">পাশের বছর </label>
	                  <input type="text" name="pass_year[]" id="pass_year" class="form-control" :value="row.pass_year" placeholder="পাশের বছর">
	                </div>
	              </div>
	              <div class="col-md-4">
	                <div class="form-group">
	                  <label for="duration">সময়কাল </label>
	                  <div class="input-group">
	                  	<input type="text" name="duration[]" id="duration" class="form-control input-group" :value="row.duration" placeholder="সময়কাল">
		                  <div class="input-group-append" v-on:click="removeElement(row);" style="cursor: pointer" title="remove">
	                    	<span class="input-group-text text-danger"><i class="fas fa-minus"></i></span>
		                  </div>
                        </div>
	                </div>
	              </div>
	              <!-- /.col -->
	        	</div>

	            <!-- /.row -->
	            <div class="col-md-12">
					<a class="btn btn-info" @click="addRow"><i class="fas fa-plus"></i></a>
				</div>
	        </div>
	        <!-- /.card-body -->
	      </div>
	      <!-- /.card -->
	    </div>
	  </div>
	  <div class="row">
	    <div class="col-12">
	    	<div class="card-footer">
	    		<button type="submit" class="btn btn-outline-success btn-lg float-right">আপডেট</button>
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
	        form: {
	        	image: "{{asset('frontend/')}}/images/employees/{{ $employee->photo }}"
	        },
	        rows: {!!json_encode($employee->edu_exp)!!}
	            
	    },
	    methods: {
	        photo(event){
				let file = event.target.files[0];
				let reader = new FileReader();
				reader.onload = (e) => {
				// The file's text will be printed here
				this.form.image = e.target.result
				};
				reader.readAsDataURL(file);
	        },
	        addRow: function () {
                this.rows.push({});
            },
            removeElement: function (row) {
                var index = this.rows.indexOf(row);
                this.rows.splice(index, 1);
            },

	    }
	});
</script> 
@endsection