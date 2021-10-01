@extends('admin_layout.admin')

@section('title')
    Add Product
@endsection

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{URL::to ('/admin')}}">Home</a></li>
              <li class="breadcrumb-item active">Product</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Add product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              {{-- <form id="quickForm"> --}}

                @if (Session::has('status'))
                      <div class="alert alert-success">
                        <li>{{Session::get('status')}}</li>
                      </div>
                    @endif

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                          <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                          </ul>
                        </div>
                    @endif

                {!!Form::open(['action' => 'App\Http\Controllers\ProductController@saveporduct', 'method' => 'Post', 'enctype' => 'multipart/form-data'])!!}

                @csrf

                <div class="card-body">
                  <div class="form-group">

                    {{-- <label for="exampleInputEmail1">Product name</label>
                    <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" placeholder="Enter product name"> --}}

                    {{Form::label ('', 'Product name', ['for' => 'exampleInputEmail1'])}}
                    {{Form::text ('product_name', '', ['class' => 'form-control', 'id' => 'exampleInputEmail1', 'placeholder' => 'Enter product name'])}}

                  </div>
                  <div class="form-group">

                    {{-- <label for="exampleInputEmail1">Product price</label>
                    <input type="number" name="product_price" class="form-control" id="exampleInputEmail1" placeholder="Enter product price" min="1"> --}}

                    {{Form::label ('', 'Product price', ['for' => 'exampleInputEmail1'])}}
                    {{Form::number ('product_price', '', ['class' => 'form-control', 'id' => 'exampleInputEmail1', 'placeholder' => 'Enter product price', 'min' => '1'])}}

                  </div>
                  <div class="form-group">

                    {{-- <label>Product category</label> --}}

                    {{-- <select class="form-control select2" style="width: 100%;">
                      <option selected="selected">Fruit</option>
                      <option>Juice</option>
                      <option>Vegetable</option>
                    </select> --}}
                    
                    {{Form::label ('', 'Product category')}}
                    {{Form::select('product_category', $categories, null, ['placeholder' => 'SelectCategory', 'class' => 'form-control select2'])}}

                  </div>

                  {{-- <label for="exampleInputFile">Product image</label> --}}

                  {{Form::label ('', 'Product image', ['for' => 'exampleInputFile'])}}

                  <div class="input-group">
                    <div class="custom-file">

                      {{-- <input type="file" class="custom-file-input" id="exampleInputFile"> --}}
                      {{Form::file ('product_image', ['class' => 'custom-file-input', 'id' => 'exampleInputFile'])}}
                      {{-- <label class="custom-file-label" for="exampleInputFile">Choose file</label> --}}

                      {{Form::label ('', 'Choose file', ['class' => 'custom-file-label', 'for' => 'exampleInputFile'])}}

                    </div>
                    {{-- <div class="input-group-append">
                      <span class="input-group-text">Upload</span>
                    </div> --}}
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <!-- <button type="submit" class="btn btn-success">Submit</button> -->

                  {{-- <input type="submit" class="btn btn-success" value="Save"> --}}

                  {{Form::submit ('save', ['class' => 'btn btn-success'])}}

                </div>

                {!!Form::close()!!}

              {{-- </form> --}}

            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
    
@endsection