@extends('admin.layouts.app')
@section('title', 'নতুন শিক্ষক-কর্মচারী বেতন প্রদান করুন ')
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
	        <h1 class="m-0 text-dark">শিক্ষক-কর্মচারী বেতন প্রদান</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">হোমে</a></li>
	          <li class="breadcrumb-item"><a href="{{route('salary-payment-list')}}">শিক্ষক-কর্মচারী বেতন প্রদান</a></li>
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
		    <form action="{{ route('salary-payment-new') }}" method="post" enctype="multipart/form-data">
		    	@csrf
		      <div class="card card-primary">
		        <div class="card-header">
		          <h3 class="card-title">শিক্ষক-কর্মচারী বেতন প্রদান</h3>

		          <div class="card-tools">
		            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
		              <i class="fas fa-minus"></i></button>
		          </div>
		        </div>
		        <div class="card-body">
		        	<div class="row">
		              <div class="col-md-6">
		                <div class="form-group">
		                  <label for="employee_id">শিক্ষক-কর্মচারী আই ডি</label>
		                  <input type="text" name="employee_id" id="employee_id" v-model='employee_id' @change='getEmpInfo()' class="form-control" value="{{old('employee_id')}}" placeholder="শিক্ষক-কর্মচারী আই ডি" required autofocus>
		                </div>
		              </div>
		              <div class="col-md-6">
		                <div class="form-group">
		                	<label for="month">মাস</label>
							<select name="month" id="month" v-model="month" class="form-control">
							<option value=''>--Select Month--</option>
							<option selected value='1'>Janaury</option>
							<option value='2'>February</option>
							<option value='3'>March</option>
							<option value='4'>April</option>
							<option value='5'>May</option>
							<option value='6'>June</option>
							<option value='7'>July</option>
							<option value='8'>August</option>
							<option value='9'>September</option>
							<option value='10'>October</option>
							<option value='11'>November</option>
							<option value='12'>December</option>
							</select>
		                </div>
		              </div>
		              <div class="col-md-6">
		                <div class="form-group">
		                	<label for="year">সাল</label>
							<select name="year" id="year" v-model="year" class="form-control"></select>
		                </div>
		              </div>
		              <div class="col-md-6">
		                <div class="form-group">
		                  <label for="amount">পরিমাণ</label>
		                  <input type="number" name="amount" id="amount" v-model="amount" class="form-control" value="{{old('amount')}}" placeholder="পরিমাণ">
		                </div>
		              </div>
		              <div class="col-md-6">
		                <div class="form-group">
		                  <label for="paid_date">প্রদানের তারিখ</label>
		                  <input type="date" name="paid_date" id="paid_date" v-model="paid_date" class="form-control" value="{{old('paid_date')}}">
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
                    <b>EMP-ID</b> <a class="float-right"><b v-text="id"></b></a>
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
	    	employee_id : '',
	    	amount: 0,
	    	img: '',
	    	name: '',
	    	id: '',
	    	phone: '',
	    	position: '',
	    	month: new Date().getMonth()+1,
	    	year: new Date().getFullYear(),
	    	paid_date: new Date().toISOString().slice(0,10),
	    },
	    methods: {
	        getEmpInfo: function(){
		      axios.get('/admin/salary-payment/employee-info', {
		         params: {
		           emp_id: this.employee_id,
		         }
		      })
		      .then(function (response) {
		         app.employee_info = response.data;
		         app.amount = response.data.salary;
		         app.name = response.data.name;
		         app.phone = response.data.phone;
		         app.id = response.data.id;
		         app.position = response.data.position;
		         app.img = "{{asset('frontend/')}}/images/employees/"+response.data.photo;
		      }); 
		    },
	    }
	});
</script> 
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
@endsection