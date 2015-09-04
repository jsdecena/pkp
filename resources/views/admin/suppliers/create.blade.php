@extends('admin.tpl.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>Create a supplier</h1>
        <ol class="breadcrumb">
          <li><a href="{{url('admin/dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Create a supplier</li>
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
                {!!Form::open(array('url'=> URL::route('admin.suppliers.store'), 'files' => true) )!!}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select name="category" id="category" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" value="{{Input::old('name')}}" placeholder="Supplier's Name" />
                        </div>
                        <div class="form-group">
                            <label for="email">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" name="email" value="{{Input::old('email')}}" placeholder="Supplier's Email" />
                        </div>
                        <div class="form-group">
                            <label for="mobile">Mobile No. <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-addon">+63</span>
                                <input type="text" class="form-control" id="mobile" name="mobile" value="{{Input::old('mobile')}}" placeholder="920xxxxxxx" maxlength="10" />
                            </div>
                        </div>                        
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" placeholder="Description">{{Input::old('description')}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="website">Website</label>
                            <input type="text" class="form-control" id="website" name="website" value="{{Input::old('website')}}" placeholder="http://" />
                        </div>
                        <div class="form-group">
                            <label for="contact">Contact Person</label>
                            <input type="text" class="form-control" id="contact" name="contact" value="{{Input::old('contact')}}" placeholder="Supplier's contact" />
                        </div>                         
                        <div class="form-group">
                            <label for="telephone">Telephone</label>
                            <div class="input-group">
                                <span class="input-group-addon">+63</span>
                                <input type="text" class="form-control" id="telephone" name="telephone" value="{{Input::old('telephone')}}" placeholder="Supplier's alternate number" maxlength="10" />
                            </div>                            
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea name="address" id="address" class="form-control" placeholder="Supplier's Address">{{Input::old('address')}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="latitude">Latitude</label>
                            <input type="text" class="form-control" id="latitude" name="latitude" value="{{Input::old('latitude')}}" placeholder="Map coordinate" />
                        </div>
                        <div class="form-group">
                            <label for="longitude">Longitude</label>
                            <input type="text" class="form-control" id="longitude" name="longitude" value="{{Input::old('longitude')}}" placeholder="Map coordinate" />
                        </div>                        
                        <div class="form-group">
                            <label for="cover">Cover Image</label>
                            <input type="file" class="form-control" id="cover" name="file" />
                        </div>
                        <div class="form-group">
                            <label class="radio-inline">
                                <input type="radio" name="status" value="0" checked="checked"> <i class="fa fa-times text-danger"></i> Disabled
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="status" value="1"> <i class="fa fa-check text-success"></i> Enabled
                            </label>
                        </div>                        
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