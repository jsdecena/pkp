@extends('admin.tpl.main')

@section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Suppliers Table <a href="{{URL::route('admin.suppliers.create')}}" class="btn btn-default">Create a supplier</a></h1>
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
                          <th>Status</th>
                          <th>Actions</th>
                        </tr>
                            @foreach($data as $supplier)
                                <tr>
                                  <td>{{$supplier->id}}</td>
                                  <td>{{$supplier->name}}</td>
                                  <td>
                                    @if(!is_null($supplier->cover))
                                        <img src="{{Image::url(asset("uploads/$supplier->cover"),100,80,array('crop'))}}" alt="" class="img-thumbnail">
                                    @else
                                        <img src="http://placehold.it/100x80" class="img-thumbnail" alt="">
                                    @endif                                    
                                  </td>                                  
                                  <td>
                                        @if($supplier->status == 0)
                                            <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                                        @else
                                            <button class="btn btn-success"><i class="fa fa-check"></i></button>
                                        @endif
                                  </td>
                                  <td>
                                        {!!Form::open(array('url' => URL::route('admin.suppliers.destroy', $supplier->id), 'method' => 'delete', 'class' => 'btn-group'))!!}
                                            <a href="{{URL::route('admin.suppliers.edit', $supplier->id)}}" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a>
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