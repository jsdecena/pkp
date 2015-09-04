@extends('admin.tpl.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>Create a user</h1>
        <ol class="breadcrumb">
          <li><a href="{{url('admin/dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Create a user</li>
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
                @include('errors.validation')
              </div><!-- /.box-header -->

                <!-- form start -->
                {!!Form::open(array('url'=> URL::route('admin.users.store'), 'files' => true))!!}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="cover">Cover Photo</label>
                            <input type="file" class="form-control" id="cover" name="file" />
                        </div>                        
                      <div class="form-group">
                        <label for="name">Your Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{Input::old('name')}}" placeholder="Your name" />
                      </div>
                      <div class="form-group">
                        <label for="email">Email address <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="email" name="email" value="{{Input::old('email')}}" placeholder="Email" />
                      </div>
                      <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="******" />
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