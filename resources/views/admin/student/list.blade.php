@extends('admin.layouts.app')
@section('title', 'শিক্ষার্থী তালিকা ')
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
        <h1>শিক্ষার্থী</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">হোমে</a></li>
          <li class="breadcrumb-item">শিক্ষার্থী</li>
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
          <h3 class="card-title">শিক্ষার্থীর তালিকা</h3>
          <div class="card-tools">
              <a href="{{route('student-add')}}" class="btn btn-success btn-flat float-right"><i class="fa fa-plus"></i> নতুন সংযুক্ত করুন</a>
           </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-sm table-striped">
              <thead>
              <tr>
                <th>#</th>
                <th>আই ডি</th>
                <th>নাম</th>
                <th>ফোন</th>
                <th>ইমেইল</th>
                <th>লিঙ্গ</th>
                <th>রক্তের গ্রুপ</th>
                <th>জন্ম তারিখ</th>
                <th>ঠিকানা</th>
                <th>ছবি</th>
                <th>অ্যাকশান</th>
              </tr>
              </thead>
              <tbody>
              @foreach($students as $key => $student)
              <tr>
                <td>{{$key+1}}</td>
                <td>{{$student->id}}</td>
                <td>{{$student->name}}</td>
                <td>{{$student->phone}}</td>
                <td>{{$student->email}}</td>
                <td>{{$student->gender}}</td>
                <td>{{$student->blood_group}}</td>
                <td>{{$student->dob}}</td>
                <td>{{$student->address}}</td>
                <td><img src="{{asset('frontend/')}}/images/students/{{ $student->image }}" height="40" width="30" alt=""></td>
                <td>
                  <div class="btn-group">
                  <a class="btn btn-primary btn-flat btn-md fa fa-edit" href="{{ route('student-edit',$student->id) }}"></a><a class="btn btn-danger btn-flat btn-md fa fa-trash-alt" href="{{ route('student-delete',$student->id) }}"></a>
                  </div>
                </td>
              </tr>
              @endforeach
              </tbody>
              <tfoot>
              <tr>
                <th>#</th>
                <th>আই ডি</th>
                <th>নাম</th>
                <th>ফোন</th>
                <th>ইমেইল</th>
                <th>লিঙ্গ</th>
                <th>রক্তের গ্রুপ</th>
                <th>জন্ম তারিখ</th>
                <th>ঠিকানা</th>
                <th>ছবি</th>
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