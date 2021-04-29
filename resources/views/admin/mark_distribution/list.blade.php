@extends('admin.layouts.app')
@section('title', 'মার্ক ডিস্ট্রিবিউশনের তালিকা ')
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
          <li class="breadcrumb-item"><a href="{{route('mark-distribution-add')}}">নতুন</a></li>
          <li class="breadcrumb-item active"><a href="{{route('mark-distribution-list')}}">তালিকা</a></li>
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
          <h3 class="card-title">মার্ক ডিস্ট্রিবিউশনের তালিকা</h3>
          <div class="card-tools">
              <a href="{{route('mark-distribution-add')}}" class="btn btn-success btn-flat float-right"><i class="fa fa-plus"></i> নতুন সংযুক্ত করুন</a>
           </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-sm table-striped">
              <thead>
              <tr>
                <!-- <th>#</th> -->
                <th>ক্লাস</th>
                <th>সাবজেক্ট</th>
                <th>মার্ক ডিস্ট্রিবিউশন</th>
                <th>অ্যাকশান</th>
              </tr>
              </thead>
              <tbody>
              @foreach($subjects as $key => $subject)
              <tr>
                <!-- <td>{{$key+1}}</td> -->
                <td>{{$subject->cls->name}}</td>
                <td>{{$subject->name}}</td>
                <td>
                  @foreach($subject->mark_distributions as $md)
                  {{$md->name}}-{{$md->mark}}<br>
                  @endforeach
                </td>
                <td>
                  <div class="btn-group">
                  <a class="btn btn-primary btn-flat btn-md fa fa-edit" href="{{ route('mark-distribution-edit',$subject->id) }}"></a><a class="btn btn-danger btn-flat btn-md fa fa-trash-alt" href="{{ route('mark-distribution-delete',$subject->id) }}"></a>
                  </div>
                </td>
              </tr>
              @endforeach
              </tbody>
              <tfoot>
              <tr>
                <!-- <th>#</th> -->
                <th>ক্লাস</th>
                <th>সাবজেক্ট</th>
                <th>মার্ক ডিস্ট্রিবিউশন</th>
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