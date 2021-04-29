@extends('admin.layouts.app')
@section('title', 'গেট পেমেন্ট')
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
	        <h1 class="m-0 text-dark">গেট পেমেন্ট</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">হোমে</a></li>
	          <li class="breadcrumb-item"><a href="{{route('get-payment-list')}}">গেট পেমেন্ট</a></li>
	          <li class="breadcrumb-item active">নতুন</li>
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
	  	<div class="col-md-8">
		    <form action="{{ route('get-payment-new') }}" method="post" enctype="multipart/form-data">
		    	@csrf
		      <div class="card card-primary">
		        <div class="card-header">
		          <h3 class="card-title">গেট পেমেন্ট</h3>

		          <div class="card-tools">
		            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
		              <i class="fas fa-minus"></i></button>
		          </div>
		        </div>
		        <div class="card-body">
		        	<div class="row">
		              <div class="col-md-6">
		                <div class="form-group">
		                  <label for="student_id">ছাত্রের আই ডি</label>
		                  <input type="text" name="student_id" id="student_id" v-model='student_id' @change='getStuInfo()' class="form-control" value="{{old('student_id')}}" placeholder="ছাত্রের আই ডি" required autofocus>
		                </div>
		              </div>
		              <div class="col-md-6">
						<div class="form-group">
							<label for="year">সাল</label>
							<select name="year" id="year" class="form-control" @change='getSetPaymentInfo()' v-model="year"></select>
						</div>
		              </div>
		        	  <div class="col-md-6">
		                <div class="form-group">
		                  <label for="class_id">ক্লাস</label>
		                  <select name="class_id" id="class_id" class="form-control" @change='getSetPaymentInfo()' v-model="class_id">
		                  	<option value="0">সিলেক্ট ক্লাস </option>
		                  	<option v-for="cls in classes" :value="cls.id">@{{cls.name}}</option>
		                  </select>
		                </div>
		              </div>
		              <div class="col-md-6">
		                <div class="form-group">
		                  <label for="set_payment_id">ফি</label>
		                  <select name="set_payment_id" id="set_payment_id" class="form-control" v-model="set_payment_id">
		                  	<option value="0">সিলেক্ট ফি </option>
		                  	<option v-for="fee in fees" :value="fee.id">@{{fee.purpose}}-@{{fee.amount}}</option>
		                  </select>
		                </div>
		              </div>
		              <div class="col-md-6">
		                <div class="form-group">
		                	<label for="paid_amount">নেওয়ার পরিমাণ</label>
							<input type="number" name="paid_amount" id="paid_amount" v-model="paid_amount" class="form-control" value="{{old('paid_amount')}}" placeholder="নেওয়ার পরিমাণ">
		                </div>
		              </div>
		              <div class="col-md-6">
		                <div class="form-group">
		                  <label for="waiver_amount">ছাড়ের পরিমাণ</label>
		                  <input type="number" name="waiver_amount" id="waiver_amount" v-model="waiver_amount" class="form-control" value="{{old('waiver_amount')}}" placeholder="ছাড়ের পরিমাণ">
		                </div>
		              </div>
		              <div class="col-md-6">
		                <div class="form-group">
		                  <label for="get_date">প্রদানের তারিখ</label>
		                  <input type="date" name="get_date" id="get_date" v-model="get_date" class="form-control" value="{{old('get_date')}}">
		                </div>
		              </div>
		              <div class="col-md-6">
		                <div class="form-group">
		                  <label for="note">মন্তব্য</label>
		                  <input type="text" name="note" id="note" v-model="note" class="form-control" value="{{old('note')}}" placeholder="মন্তব্য">
		                </div>
		              </div>
		              <!-- /.col -->
		        	</div>
		            <!-- /.row -->
		        </div>
		        <!-- /.card-body -->
		        <div class="card-footer">
		    		<button type="submit" class="btn btn-outline-success btn-lg float-right">সংরক্ষণ</button>
		    	</div>
		      </div>
		      <!-- /.card -->
		    </form>
	    </div>
	    <div class="col-md-2" v-if="id">
	      <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" :src="img" alt="">
                </div>

                <h3 class="profile-username text-center" v-text="name"></h3>

                <p class="text-muted text-center" v-text="position"></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>ST-ID</b> <a class="float-right"><b v-text="id"></b></a>
                  </li>
                  <li class="list-group-item">
                    <b>Phone</b> <a class="float-right"><b v-text="phone"></b></a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
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
<script>
var app = new Vue({
    el: "#app",
    data: {
    	student_id : '',
    	waiver_amount: 0,
    	img: '',
    	name: '',
    	id: '',
    	phone: '',
    	position: '',
    	note: '',
    	paid_amount: 0,
    	get_date: new Date().toISOString().slice(0,10),
    	classes: {!!json_encode($classes)!!},

    	year: new Date().getFullYear(),
    	class_id: 0,
    	fees: '',
    	set_payment_id : 0,
    },
    methods: {
        getStuInfo: function(){
	      axios.get('/admin/get-payment/student-info', {
	         params: {
	           stu_id: this.student_id,
	         }
	      })
	      .then(function (response) {
	         app.name = response.data.name;
	         app.phone = response.data.phone;
	         app.id = response.data.id;
	         app.position = response.data.position;
	         app.img = "{{asset('frontend/')}}/images/students/"+response.data.image;
	      }); 
	    },
	    getSetPaymentInfo: function(){
	      axios.get('/admin/get-payment/set-payment-info', {
	         params: {
	           class_id: this.class_id,
	           year: this.year,
	         }
	      })
	      .then(function (response) {
	         app.fees = response.data;
	         app.set_payment_id = 0;
	      }); 
	    },
    },
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