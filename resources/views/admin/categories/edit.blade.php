@extends('admin.tpl.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>Create a category</h1>
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

                <!-- form start -->
                {!!Form::open(array('url'=> URL::route('admin.categories.update', $category->id), 'method' => 'put' ) )!!}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$category->name}}" />
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control">{{$category->description}}</textarea>
                        </div>
                        @if(!is_null($category->cover))
                            <div class="form-group">
                                <div><img src="{{$category->cover}}" alt="" /></div>
                                <label for="cover">Cover Image</label>
                                <input type="file" class="form-control" id="cover" name="cover" />
                            </div>
                        @endif
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <a href="{{URL::route('admin.categories.index')}}" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                {!!Form::close()!!}

            </div><!-- /.box -->
          </div><!--/.col (left) -->
        </div>   <!-- /.row -->
      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
@endsection