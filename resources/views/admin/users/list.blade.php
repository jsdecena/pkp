@extends('admin.tpl.main')

@section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Users Table <a href="{{URL::route('admin.users.create')}}" class="btn btn-default">Create a user</a></h1>
          <ol class="breadcrumb">
            <li><a href="{{url('admin/dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Users</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            @include('errors.message')
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Actions</th>
                    </tr>
                    @foreach($users as $user)
                        <tr>
                          <td>{{$user->id}}</td>
                          <td>{{$user->name}}</td>
                          <td>{{$user->email}}</td>
                          <td>
                                {!!Form::open(array('url' => URL::route('admin.users.destroy', $user->id), 'method' => 'delete', 'class' => 'btn-group'))!!}
                                    <a href="{{URL::route('admin.users.show', $user->id)}}" class="btn btn-default"><i class="fa fa-eye"></i> Show details</a>
                                    <a href="{{URL::route('admin.users.edit', $user->id)}}" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a>
                                    <button type="submit" name="submit" class="btn btn-danger" onClick="return confirm('Are you sure you want to delete?')"> <i class="fa fa-times"></i> Delete</button>
                                {!!Form::close()!!}
                          </td>
                        </tr>
                    @endforeach
                  </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">{!! $users->render() !!}</div>
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
@endsection