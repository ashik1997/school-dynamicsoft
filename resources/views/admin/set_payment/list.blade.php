@extends('admin.layouts.app')
@section('title', 'সেট পেমেন্টের তালিকা')
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
	        <h1 class="m-0 text-dark">সেট পেমেন্ট</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">হোমে</a></li>
	          <li class="breadcrumb-item"><a href="{{route('set-payment-list')}}">সেট পেমেন্টের</a></li>
	          <li class="breadcrumb-item active">তালিকা</li>
	        </ol>
	      </div><!-- /.col -->
	    </div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
	<div class="row">
	    <div class="col-md-6">
	      <div class="card card-secondary">
	        <div class="card-header">
	          <h3 class="card-title">সেট পেমেন্টের তালিকা</h3>
	          <div class="card-tools">
	            <a href="{{route('set-payment-add')}}" class="btn btn-success float-right">নতুন যুক্ত</a>
	          </div>
	        </div>
	        <div class="card-body">
	        	<div class="table-responsive">
		            <table id="example1" class="table table-bordered table-sm table-striped">
		              <thead>
		              <tr>
		                <th>#</th>
		                <th>উদ্দেশ</th>
		                <th>ক্লাস</th>
		                <th>বছর</th>
		                <th>পরিমান</th>
		                <th>অ্যাকশান</th>
		              </tr>
		              </thead>
		              <tbody>
		              @foreach($set_payments as $key => $set_payment)
		              <tr>
		                <td>{{$key+1}}</td>
		                <td>{{$set_payment->purpose}}</td>
		                <td>@if(!empty($set_payment->cls->name)){{$set_payment->cls->name}}@endif</td>
		                <td>{{$set_payment->year}}</td>
		                <td>{{$set_payment->amount}}</td>
		                <td>
		                  <div class="btn-group">
		                  <a class="btn btn-primary btn-flat btn-md fa fa-edit" href="{{ route('set-payment-edit',$set_payment->id) }}"></a><a class="btn btn-danger btn-flat btn-md fa fa-trash-alt" href="{{ route('set-payment-delete',$set_payment->id) }}"></a>
		                  </div>
		                </td>
		              </tr>
		              @endforeach
		              </tbody>
		              <tfoot>
		              <tr>
		                <th>#</th>
		                <th>উদ্দেশ</th>
		                <th>ক্লাস</th>
		                <th>বছর</th>
		                <th>পরিমান</th>
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
@endsection