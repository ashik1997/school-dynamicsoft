@extends('admin.layouts.app')
@section('title', 'গেট পেমেন্টের তালিকা ')
@section('link')
<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('backend/')}}/plugins/fontawesome-free/css/all.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="{{asset('backend/')}}/ionicons/2.0.1/css/ionicons.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('backend/')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
<!-- Theme style -->
<link rel="stylesheet" href="{{asset('backend/')}}/dist/css/adminlte.min.css">
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
@endsection
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>গেট পেমেন্ট</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">হোমে</a></li>
          <li class="breadcrumb-item">গেট পেমেন্টের</li>
          <li class="breadcrumb-item active">তালিকা</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">গেট পেমেন্টের তালিকা</h3>
          <div class="card-tools">
              <a href="{{route('get-payment-new')}}" class="btn btn-success btn-flat float-right"><i class="fa fa-plus"></i> নতুন সংযুক্ত করুন</a>
           </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-sm table-striped">
              <thead>
              <tr>
                <th>#</th>
                <th>ছাত্রের আই ডি</th>
                <th>ক্লাস - উদ্দেশ্য  - পরিমান</th>
                <th>প্রদানের তারিখ </th>
                <th>নেওয়ার পরিমান</th>
                <th>ছাড়ের পরিমান</th>
                <th>মন্তব্য</th>
                <th>অ্যাকশান</th>
              </tr>
              </thead>
              <tbody>
              @foreach($get_payments as $key => $get_payment)
              <tr>
                <td>{{$key+1}}</td>
                <td>{{$get_payment->student_id}}</td>
                <td>{{$get_payment->class_name}}-{{$get_payment->set_payment_purpose}}-{{$get_payment->set_payment_amount}}</td>
                <td>{{$get_payment->get_date}}</td>
                <td>{{$get_payment->paid_amount}}</td>
                <td>{{$get_payment->waiver_amount}}</td>
                <td>{{$get_payment->note}}</td>
                <td>
                  <div class="btn-group">
                  <a class="btn btn-primary btn-flat btn-md fa fa-edit" href="{{ route('get-payment-edit',$get_payment->id) }}"></a><a class="btn btn-danger btn-flat btn-md fa fa-trash-alt" href="{{ route('get-payment-delete',$get_payment->id) }}"></a>
                  </div>
                </td>
              </tr>
              @endforeach
              </tbody>
              <tfoot>
              <tr>
                <th>#</th>
                <th>ছাত্রের আই ডি</th>
                <th>ক্লাস - উদ্দেশ্য  - পরিমান</th>
                <th>প্রদানের তারিখ </th>
                <th>নেওয়ার পরিমান</th>
                <th>ছাড়ের পরিমান</th>
                <th>মন্তব্য</th>
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
    <!-- /.col -->
  </div>
  <!-- /.row -->
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