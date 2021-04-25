@extends('layouts.dashboard')

@section('breadcrum')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
                        <div class="col-md-3">
                    <div class="card widget">
    <div class="card-body">
        <div class="row">
            <div class="p-3 text-primary flex-1">
                <i class="fa fa-users fa-3x"></i>
            </div>

            <div class="pr-3">
                <h2 class="text-right">3</h2>
                <div class="text-muted">Total Users</div>
            </div>
        </div>
    </div>
</div>

                    </div>
                                <div class="col-md-3">
                    <div class="card widget">
    <div class="card-body">
        <div class="row">
            <div class="p-3 text-success flex-1">
                <i class="fa fa-user-plus fa-3x"></i>
            </div>

            <div class="pr-3">
                <h2 class="text-right">3</h2>
                <div class="text-muted">New Users</div>
            </div>
        </div>
    </div>
</div>

                    </div>
                                <div class="col-md-3">
                    <div class="card widget">
    <div class="card-body">
        <div class="row">
            <div class="p-3 text-danger flex-1">
                <i class="fa fa-user-slash fa-3x"></i>
            </div>

            <div class="pr-3">
                <h2 class="text-right">0</h2>
                <div class="text-muted">Banned Users</div>
            </div>
        </div>
    </div>
</div>

                    </div>
    <div class="col-md-3">
                    <div class="card widget">
    <div class="card-body">
        <div class="row">
            <div class="p-3 text-info flex-1">
                <i class="fa fa-user fa-3x"></i>
            </div>

            <div class="pr-3">
                <h2 class="text-right">0</h2>
                <div class="text-muted">Unconfirmed Users</div>
            </div>
        </div>
    </div>
</div>
       
      </div><!-- /.container-fluid -->
    </section>

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add New</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                    </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
@endsection


<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script type="text/javascript">
  
  @if(session('message') && session('class') == "success")
  $(document).ready(function(){

  toastr.success("{{session('message')}}");  

  })

  @elseif(session('message') && session('class') == "danger")
  
  $(document).ready(function(){

  toastr.error("{{session('message')}}");  

  })  

 @endif

</script>

<script type="text/javascript">
  
$(document).ready(function(){

  //toastr.success("Thank You");  

})

</script>