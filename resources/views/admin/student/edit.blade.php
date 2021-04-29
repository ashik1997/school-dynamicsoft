@extends('admin.layouts.app')
@section('title', 'শিক্ষার্থী সম্পাদনা করুন')
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
	        <h1 class="m-0 text-dark">শিক্ষার্থী</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">হোমে</a></li>
	          <li class="breadcrumb-item"><a href="{{route('student-list')}}">শিক্ষার্থী</a></li>
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
    <form action="{{ route('student-update',$student->id) }}" method="post" enctype="multipart/form-data">
    	@csrf
	  <div class="row">
	    <div class="col-md-6">
	      <div class="card card-primary">
	        <div class="card-header">
	          <h3 class="card-title">শিক্ষার্থীদের তথ্য</h3>

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
	                  <input type="text" name="name" id="name" class="form-control" value="{{$student->name}}" placeholder="নাম" required autofocus>
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                  <label for="phone">ফোন</label>
	                  <input type="tel"  name="phone" id="phone" class="form-control" value="{{$student->phone}}" placeholder="ফোন">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                  <label for="email">ইমেইল</label>
	                  <input type="email" name="email" id="email" class="form-control" value="{{$student->email}}" placeholder="ইমেইল">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                  <label for="dob">জন্ম তারিখ</label>
	                  <input type="date" name="dob" id="dob" class="form-control" value="{{$student->dob}}" placeholder="জন্ম তারিখ">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                  <label for="blood_group">রক্তের গ্রুপ</label>
	                  <input type="text" name="blood_group" id="blood_group" class="form-control" value="{{$student->blood_group}}" placeholder="রক্তের গ্রুপ">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="gender">লিঙ্গ</label>
	                	<br>
						<label class="radio-inline">
						<input type="radio" name="gender" @if($student->gender=='পুরুষ'){{ ('checked') }} @endif value="পুরুষ">পুরুষ 
						</label>
						<label class="radio-inline">
						<input type="radio" name="gender" @if($student->gender=='মহিলা'){{ ('checked') }} @endif value="মহিলা">মহিলা 
						</label>
						<label class="radio-inline">
						<input type="radio" name="gender" @if($student->gender=='অন্যান্য'){{ ('checked') }} @endif value="অন্যান্য">অন্যান্য 
						</label>
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                  <label for="addresss">ঠিকানা</label>
	                  <textarea name="address" id="address" class="" placeholder="ঠিকানা"
	                  style="width: 100%; height: 60px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$student->address}}</textarea>
	                </div>
	                <!-- /.form-group -->
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                  <label for="image">ছবি (আকার: ৪৫০x৬০০)</label>
	                  <input type="file" name="image" id="image"  @change="photo($event)" class="form-control-file" >
	                  <br>
	                  <img :src="form.image" alt="" width="175" height="200">
	                </div>
	                <!-- /.form-group -->
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
	      <div class="card card-secondary">
	        <div class="card-header">
	          <h3 class="card-title">অভিভাবকদের তথ্য</h3>
	          <div class="card-tools">
	            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
	              <i class="fas fa-minus"></i></button>
	          </div>
	        </div>
	        <div class="card-body">
	        	<h6><i class="fas fa-edit" aria-hidden="true"></i> পিতা / অভিভাবক</h6>
		        <hr>
	        	<div class="row">
	              <div class="col-md-6">
	                <div class="form-group">
	                  <label for="f_name">নাম</label>
	                  <input type="text" name="f_name" id="f_name" class="form-control" value="{{$student->guardian->father_name}}" placeholder="নাম" >
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                  <label for="f_phone">ফোন</label>
	                  <input type="tel" name="f_phone" id="f_phone" class="form-control" value="{{$student->guardian->father_phone}}" placeholder="ফোন">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                  <label for="f_email">ইমেইল</label>
	                  <input type="email" name="f_email" id="f_email" class="form-control" value="{{$student->guardian->father_email}}" placeholder="ইমেইল">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                  <label for="f_occupation">পেশা</label>
	                  <input type="text" name="f_occupation" id="f_occupation" class="form-control" value="{{$student->guardian->father_occupation}}" placeholder="পেশা">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                  <label for="f_address">ঠিকানা</label>
	                  <textarea name="f_address" id="f_address" class="" placeholder="ঠিকানা"
	                  style="width: 100%; height: 50px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$student->guardian->father_address}}</textarea>
	                </div>
	                <!-- /.form-group -->
	              </div>
	              <!-- /.col -->
	        	</div>
	            <!-- /.row -->
	            <h6><i class="fas fa-edit" aria-hidden="true"></i> মাতা / অভিভাবক</h6>
		        <hr>
	        	<div class="row">
	              <div class="col-md-6">
	                <div class="form-group">
	                  <label for="m_name">নাম</label>
	                  <input type="text" value="{{$student->guardian->mother_name}}" name="m_name" id="m_name" class="form-control" placeholder="নাম" >
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                  <label for="m_phone">ফোন</label>
	                  <input type="tel" name="m_phone" id="m_phone" class="form-control" value="{{$student->guardian->mother_phone}}" placeholder="ফোন">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                  <label for="m_email">ইমেইল</label>
	                  <input type="email" name="m_email" id="m_email" class="form-control" value="{{$student->guardian->mother_email}}" placeholder="ইমেইল">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                  <label for="m_occupation">পেশা</label>
	                  <input type="text" name="m_occupation" id="m_occupation" class="form-control" value="{{$student->guardian->mother_occupation}}" placeholder="পেশা">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                  <label for="m_address">ঠিকানা</label>
	                  <textarea name="m_address" id="m_address" class="" placeholder="ঠিকানা"
	                  style="width: 100%; height: 50px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$student->guardian->mother_address}}</textarea>
	                </div>
	                <!-- /.form-group -->
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
	        	   	<input type="hidden" name="registration_id" value="{{$student->registration->id}}">
					<div class="form-group">
						<label for="year">সাল</label>
						<select name="year" id="year" class="form-control" v-model='year' @change='getClassSection()'></select>
					</div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                  <label for="class_id">ক্লাস</label>
	                  <select v-model="cls" name="class_id" id="class_id" class="form-control" @change='getClassSection()'>
	                  	<option value="0">সিলেক্ট ক্লাস </option>
	                  	<option v-for="cl in classes" :value="cl.id">@{{cl.name}}</option>
	                  </select>
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                  <label for="section_id">সেকশন</label>
	                  <select v-model="sec" name="section_id" id="section_id" class="form-control">
	                  	<option value="0">সিলেক্ট সেকশন </option>
	                  	<option v-for="section in sections" :value="section.id">@{{section.name}}</option>
	                  </select>
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                  <label for="group_id">বিভাগ</label>
	                  <select v-model="group_id" name="group_id" id="group_id" class="form-control">
	                  	<option v-for="group in groups" :value="group.id">@{{group.name}}</option>
	                  </select>
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                  <label for="class_roll">ক্লাস রোল</label>
	                  <input type="text" name="class_roll" id="class_roll" class="form-control" value="{{$student->registration->class_roll}}" placeholder="ক্লাস রোল">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                  <label for="board_roll">বোর্ড রোল</label>
	                  <input type="text" name="board_roll" id="board_roll" class="form-control" value="{{$student->registration->board_roll}}" placeholder="বোর্ড রোল">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                  <label for="board_roll">বোর্ড নিবন্ধন নং</label>
	                  <input type="text" name="board_reg_no" id="board_reg_no" class="form-control" value="{{$student->registration->board_reg_no}}" placeholder="বোর্ড নিবন্ধন নং">
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
	  </div>
	  <div class="row">
	    <div class="col-12">
	    	<div class="card-footer">
	        	<button type="submit" class="btn btn-success btn-lg float-right">আপডেট</button>
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
  let dateDropdown = document.getElementById('year'); 
       
  let currentYear = new Date().getFullYear();    
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
	    	sec: "{{$student->registration->section_id}}",
	    	group_id: "{{$student->registration->group_id}}",
	    	year: "{{$student->registration->year}}",
	    	sections: '',
	    	groups: {!!json_encode($groups)!!},
	    	cls: "{{$student->registration->class_id}}",
	    	classes: {!!json_encode($classes)!!},
	        form: {
	        	image: "{{asset('frontend/')}}/images/students/{{ $student->image }}"
	        }
	            
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
	        getClassSection: function(){
		      axios.get('/admin/class-section', {
		         params: {
		           class_id: this.cls,
		           year: this.year
		         }
		      })
		      .then(function (response) {
		         app.sections = response.data;
		         // app.sec = 0;
		      }); 
		    },

	    },mounted(){
	    	this.getClassSection();
		}
	});
</script>

@endsection