@extends('admin.tpl.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>Category : {{$category->name}}</h1>
        <ol class="breadcrumb">
          <li><a href="{{url('admin/dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Create a category</li>
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
                <table class="table table-bordered">
                <tr>
                    <td><strong>Name:</strong></td>
                    <td>{{$category->name}}</td>
                </tr>
                <tr>
                    <td><strong>Descripton:</strong></td>
                    <td>{{$category->description}}</td>
                </tr>
                @if(!is_null($category->cover))
                <tr>
                    <td><strong>Cover Image:</strong></td>
                    <td><img src="{{$category->cover}}" alt=""></td>
                </tr>
                @endif                
                </table>
                <div class="box-footer">
                    <a href="{{URL::route('admin.categories.index')}}" class="btn btn-default">Back</a>
                </div>
            </div><!-- /.box -->
          </div><!--/.col (left) -->
        </div>   <!-- /.row -->
      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
@endsection