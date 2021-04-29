@extends('admin.layouts.app')
@section('title', 'Slider List')
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
        <h1>Slider</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item">Slider</li>
          <li class="breadcrumb-item active">List</li>
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
          <h3 class="card-title">Slider List</h3>
          <div class="card-tools">
              <a href="{{route('slider-add')}}" class="btn btn-success float-right">Create New Slider</a>
           </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Sub-title</th>
              <th>Description</th>
              <th>Image</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($sliders as $key => $slider)
            <tr>
              <td>{{$key+1}}</td>
              <td>{{$slider->title}}</td>
              <td>{{$slider->sub_title}}</td>
              <td>{{$slider->description}}</td>
              <td><img src="{{asset('frontend/')}}/images/slider/{{ $slider->image }}" height="242" width="480" alt=""></td>
              <td><a class="btn btn-primary btn-md fa fa-edit" href="{{ route('slider-edit',$slider->id) }}"></a>||<a class="btn btn-danger btn-md fa fa-trash-alt" href="{{ route('slider-delete',$slider->id) }}"></a></td>
            </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Sub-title</th>
              <th>Description</th>
              <th>Image</th>
              <th>Action</th>
            </tr>
            </tfoot>
          </table>
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
// $(document).on('click', '.delete', function (e) {
//     e.preventDefault();
//     Swal.fire({
// 	  title: 'Are you sure?',
// 	  text: "You won't be able to revert this!",
// 	  icon: 'warning',
// 	  showCancelButton: true,
// 	  confirmButtonColor: '#3085d6',
// 	  cancelButtonColor: '#d33',
// 	  confirmButtonText: 'Yes, delete it!'
// 	}).then((result) => {
// 	  if (result.isConfirmed) {
// 	    Swal.fire(
// 	      'Deleted!',
// 	      'Your file has been deleted.',
// 	      'success'
// 	    )
// 	  }
// 	})
// });
</script>
@endsection