@extends('admin.tpl.main')

@section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Categories Table <a href="{{URL::route('admin.categories.create')}}" class="btn btn-default">Create a category</a></h1>
          <ol class="breadcrumb">
            <li><a href="{{url('admin/dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">categories</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            @include('errors.message')
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                @if(!$data->isEmpty())                
                    <div class="box-body">
                        <table class="table table-bordered">
                        <tr>
                          <th style="width: 10px">#</th>
                          <th>Name</th>
                          <th>Cover</th>
                          <th>Actions</th>
                        </tr>
                            @foreach($data as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>
                                        @if(!is_null($category->cover))
                                            <img src="{{Image::url(asset("uploads/$category->cover"),100,80,array('crop'))}}" alt="" class="img-thumbnail">
                                        @endif
                                    </td>
                                    <td>
                                        {!!Form::open(array('url' => URL::route('admin.categories.destroy', $category->id), 'method' => 'delete', 'class' => 'btn-group'))!!}
                                            <a href="{{URL::route('admin.categories.show', $category->id)}}" class="btn btn-default"><i class="fa fa-eye"></i> Show details</a>
                                            <a href="{{URL::route('admin.categories.edit', $category->id)}}" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a>
                                            <button type="submit" name="submit" class="btn btn-danger" onClick="return confirm('Are you sure you want to delete?')"> <i class="fa fa-times"></i> Delete</button>
                                        {!!Form::close()!!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div><!-- /.box-body -->
                    <div class="box-footer clearfix">{!! $data->render() !!}</div>
                    @else
                        <p class="alert alert-warning">No data to show.</p>
                    @endif                
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
@endsection