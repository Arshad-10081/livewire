
@extends('..layouts.dashboard')

@section('breadcrum')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Show Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Show Users</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
@endsection

   
@section('content')

 <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Users Data</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead align="center">
                <tr align="center">
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody align="center">
                @forelse($users as $user)
                <tr>
                <td>{{$user['id']}}</td> 
                <td>{{$user['name']}}</td>   
                <td>{{$user['email']}}</td>
                @if($user['status'] == "1")   
                <td>
                <input class="form-check-input active" type="checkbox" id="active" checked value="1">
                </td> 
                @else
                <td>
                <input class="form-check-input inactive" type="checkbox" id="inactive" value="0">
                </td>
                 @endif
                <td>
                 <a href="/edit/{{$user['id']}}" class="" title="Edit"><i class="fas fa-edit"></i></a> 
                 <a href="/delete/{{$user['id']}}" class="" title="Delete"><i class="fas fa-inbox" ></i></a> 
                </td> 
                @empty
                <td colspan="5" align="center">{{"Record Not Found!"}}</td>
                </tr>
                @endforelse
                </tbody>
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

<script src="{{asset('plugins/jquery/jquery-3.6.0.min.js')}}"></script>
<script type="text/javascript">

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
  
  @if(session('message') && session('class') == "success")
  $(document).ready(function(){

  toastr.success("{{session('message')}}");  

  })

  @elseif(session('message') && session('class') == "danger")
  
  $(document).ready(function(){

  toastr.error("{{session('message')}}");  

  })  

 @endif


 $(document).ready(function(){

 $(document).on("click",".active",function(){

  alert("working");

  var status = $(this).val();

  alert(status);

 });

 });

</script>





