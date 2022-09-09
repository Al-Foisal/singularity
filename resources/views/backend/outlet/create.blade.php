@extends('backend.layouts.master')
@section('title', 'Add outlet')

@section('backend')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add outlet</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Add outlet</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('outlets.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" value="{{ old('name') }}" placeholder="Enter outlet name" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Phone</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" value="{{ old('phone') }}" placeholder="Enter outlet phone" name="phone">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Latitude</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" value="{{ old('latitude') }}" placeholder="Enter outlet latitude" name="latitude">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Longitude</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" value="{{ old('longitude') }}" placeholder="Enter outlet longitude" name="longitude">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">Outlet Image</label>
                                    <div class="form-group">
                                        <div class="custom-file">
                                            <input type="file" class="form-control" name="image"
                                                id="exampleInputFile">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
