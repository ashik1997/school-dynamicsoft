@extends('admin.layouts.app')
@section('title', 'শিক্ষক তালিকা ')
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
        <h1>শিক্ষক</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">হোমে</a></li>
          <li class="breadcrumb-item">শিক্ষক</li>
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
          <h3 class="card-title"> শিক্ষকের তালিকা</h3>
          <div class="card-tools">
              <a href="{{route('employee-add')}}" class="btn btn-success btn-flat float-right"><i class="fa fa-plus"></i> নতুন সংযুক্ত করুন</a>
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
                <th>এন.আই.ডি নম্বর</th>
                <th>ঠিকানা</th>
                <th>বিস্তারিত</th>
                <th>যোগদানের তারিখ</th>
                <th>পদত্যাগের তারিখ</th>
                <th>অবস্থান</th>
                <th>বেতন</th>
                <th>শিক্ষাগত অভিজ্ঞতা</th>
                <th>ছবি</th>
                <th>অ্যাকশান</th>
              </tr>
              </thead>
              <tbody>
              @foreach($employees as $key => $employee)
              <tr>
                <td>{{$key+1}}</td>
                <td>{{$employee->id}}</td>
                <td>{{$employee->name}}</td>
                <td>{{$employee->phone}}</td>
                <td>{{$employee->email}}</td>
                <td>{{$employee->gender}}</td>
                <td>{{$employee->blood_group}}</td>
                <td>{{$employee->dob}}</td>
                <td>{{$employee->nid}}</td>
                <td>{{$employee->address}}</td>
                <td>{{$employee->details}}</td>
                <td>{{$employee->join_date}}</td>
                <td>{{$employee->resign_date}}</td>
                <td>{{$employee->position}}</td>
                <td>{{$employee->salary}}</td>
                <td>
                  <table class="table-bordered">
                    @foreach($employee->edu_exp as $edu)
                    <tr>
                      <td>{{$edu->exam_name}}</td>
                      <td>{{$edu->group_subject}}</td>
                      <td>{{$edu->institute}}</td>
                      <td>{{$edu->result}}</td>
                      <td>{{$edu->pass_year}}</td>
                      <td>{{$edu->duration}}</td>
                    </tr>
                    @endforeach
                  </table>
                </td>
                <td><img src="{{asset('frontend/')}}/images/employees/{{ $employee->photo }}" height="40" width="30" alt=""></td>
                <td>
                  <div class="btn-group">
                  <a class="btn btn-primary btn-flat btn-md fa fa-edit" href="{{ route('employee-edit',$employee->id) }}"></a><a class="btn btn-danger btn-flat btn-md fa fa-trash-alt" href="{{ route('employee-delete',$employee->id) }}"></a>
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
                <th>এন.আই.ডি নম্বর</th>
                <th>ঠিকানা</th>
                <th>বিস্তারিত</th>
                <th>যোগদানের তারিখ</th>
                <th>পদত্যাগের তারিখ</th>
                <th>অবস্থান</th>
                <th>বেতন</th>
                <th>শিক্ষাগত অভিজ্ঞতা</th>
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