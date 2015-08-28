@extends('admin.tpl.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>Edit a user<small>Preview</small></h1>
        <ol class="breadcrumb">
          <li><a href="{{url('admin/dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Edit a user</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">You are editing: {{$user->name}}</h3>
              </div><!-- /.box-header -->
              
                @include('errors.validation')
                @include('errors.message')

                <!-- form start -->
                {!!Form::open(array('url'=> URL::route('admin.users.update', $user->id), 'method' => 'put'))!!}
                    <div class="box-body">
                      <div class="form-group">
                        <label for="name">Your Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}" />
                      </div>                      
                      <div class="form-group">
                        <label for="email">Email address <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" />
                        <span class="help-inline">if you are changing your own email or password, you will be logged out of the application.</span>
                      </div>
                      <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="******" />
                        <span class="help-inline">leave the password blank if not changing password</span>
                      </div>
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <a href="{{URL::route('admin.users.index')}}" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                {!!Form::close()!!}

            </div><!-- /.box -->
          </div><!--/.col (left) -->
        </div>   <!-- /.row -->
      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
@endsection