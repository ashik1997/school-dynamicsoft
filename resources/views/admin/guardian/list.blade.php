@extends('admin.layouts.app')
@section('title', 'অভিভাবকদের তালিকা')
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
        <h1>অভিভাবক </h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">হোমে</a></li>
          <li class="breadcrumb-item">অভিভাবক </li>
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
          <h3 class="card-title">অভিভাবকদের তালিকা</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-sm table-striped">
              <thead>
              <tr>
                <th>#</th>
                <th>ছাত্ররের আই ডি</th>
                <th colspan="5">পিতা/ অভিভাবক</th>
              	<th colspan="5">মাতা/অভিভাবক </th>
                <th>অ্যাকশান</th>
              </tr>
              <tr>
              	<th></th>
              	<th></th>
              	<th>নাম</th>
                <th>ফোন</th>
                <th>ইমেইল</th>
                <th>পেশা</th>
                <th>ঠিকানা</th>
                <th>নাম</th>
                <th>ফোন</th>
                <th>ইমেইল</th>
                <th>পেশা</th>
                <th>ঠিকানা</th>
                <th></th>
              </tr>
              </thead>
              <tbody>
              @foreach($guardians as $key => $guardian)
              <tr>
                <td>{{$key+1}}</td>
                <td>{{$guardian->student_id}}</td>
                <td>{{$guardian->father_name}}</td>
                <td>{{$guardian->father_phone}}</td>
                <td>{{$guardian->father_email}}</td>
                <td>{{$guardian->father_occupation}}</td>
                <td>{{$guardian->father_address}}</td>
                <td>{{$guardian->mother_name}}</td>
                <td>{{$guardian->mother_phone}}</td>
                <td>{{$guardian->mother_email}}</td>
                <td>{{$guardian->mother_occupation}}</td>
                <td>{{$guardian->mother_address}}</td>
                <td>
                  <div class="btn-group">
                  <a class="btn btn-primary btn-flat btn-md fa fa-edit" href="{{ route('guardian-edit',$guardian->id) }}"></a>
                  <!-- <a class="btn btn-danger btn-flat btn-md fa fa-trash-alt" href=""></a> -->
                  </div>
                </td>
              </tr>
              @endforeach
              </tbody>
              <tfoot>
              <tr>
                <th colspan="2"></th>
              	<th>নাম</th>
                <th>ফোন</th>
                <th>ইমেইল</th>
                <th>পেশা</th>
                <th>ঠিকানা</th>
                <th>নাম</th>
                <th>ফোন</th>
                <th>ইমেইল</th>
                <th>পেশা</th>
                <th>ঠিকানা</th>
                <th></th>
              </tr>
              <tr>
                <th>#</th>
                <th>ছাত্ররের আই ডি</th>
                <th colspan="5">পিতা/ অভিভাবক</th>
              	<th colspan="5">মাতা/অভিভাবক </th>
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