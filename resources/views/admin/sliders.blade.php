@extends('admin_layout.admin')

@section('title')
    Sliders
@endsection

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sliders</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{URL::to ('/admin')}}">Home</a></li>
              <li class="breadcrumb-item active">Sliders</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Sliders</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                @if (Session::has('status'))
                      <div class="alert alert-success">
                        <li>{{Session::get('status')}}
                          {{Session::put('status', null)}}</li>
                      </div>
                    @endif

                    @if (Session::has('status2'))
                      <div class="alert alert-warning">
                        <li>{{Session::get('status2')}}
                          {{Session::put('status2', null)}}</li>
                      </div>
                    @endif

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                          <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                          </ul>
                        </div>
                    @endif
                    
                <table id="example1" class="table table-bordered table-striped">
                  <thead>

                    <tr align="center">
                      <th>Num.</th>
                      <th>Picture</th>
                      <th>Description one</th>
                      <th>Description Two</th>
                      <th>Actions</th>
                    </tr>

                  </thead>
                  <tbody>

                    {{Form::hidden('', $increment = 1)}}
                    @foreach ($slider as $sliders)
                        

                    <tr align="center">
                      <td>{{$increment}}</td>
                      <td>
                        <img src="slider_images/{{$sliders -> slider_image}}" style="height : 50px; width : 50px"
                          class="img-circle elevation-2" alt="{{$sliders -> slider_image}}">
                      </td>
                      <td>
                        {{$sliders -> description1}}
                      </td>
                      <td>{{$sliders -> description2}}</td>
                      <td>

                        @if ($sliders -> status == 1)
                        <a href="{{URL::to ('/activationofslider', $sliders -> id)}}" class="btn btn-success">Deactivate</a>
                        @else
                        <a href="{{URL::to ('/activationofslider', $sliders -> id)}}" class="btn btn-warning">Activate</a>
                        @endif
                        
                        <a href="{{URL::to ('/editslider', $sliders -> id)}}" class="btn btn-primary"><i class="nav-icon fas fa-edit"></i></a>
                        <a href="{{URL::to ('/deleteslider', $sliders -> id)}}" id="delete" class="btn btn-danger"><i class="nav-icon fas fa-trash"></i></a>
                      </td>
                    </tr>

                    {{Form::hidden('', $increment = $increment + 1)}}
                    @endforeach
                  </tbody>
                  <tfoot>
                    
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
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

    
@endsection

@section('style')
    
  <link rel="stylesheet" href="backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  
@endsection

@section('scripts')

<!-- DataTables -->
<script src="backend/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="backend/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="backend/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->




<script src="backend/dist/js/bootbox.min.js"></script>
<!-- page script -->

<script>
  $(document).on("click", "#delete", function(e){
  e.preventDefault();
  var link = $(this).attr("href");
  bootbox.confirm("Do you really want to delete this element ?", function(confirmed){
    if (confirmed){
        window.location.href = link;
      };
    });
  });
</script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
    
@endsection