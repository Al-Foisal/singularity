@extends('backend.layouts.master')
@section('title', 'Outlet')

@section('backend')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Main Outlet List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Outlet</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a href="{{ route('outlets.create') }}" class="btn btn-outline-primary">Add Outlet</a>
                            <br>
                            <br>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Latitude</th>
                                        <th>Longitude</th>
                                        <th>Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($outlets as $outlet)
                                        <tr>
                                            <td class="d-flex justify-content-between">
                                                <a href="{{ route('outlets.edit', $outlet) }}"
                                                    class="btn btn-info btn-xs"> <i class="fas fa-edit"></i> </a>
                                                <form action="{{ route('outlets.destroy', $outlet) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit"
                                                        onclick="return(confirm('Are you sure want to delete this item?'))"
                                                        class="btn btn-danger btn-xs"> <i class="far fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                            <td>{{ $outlet->name }}</td>
                                            <td>{{ $outlet->phone }}</td>
                                            <td>{{ $outlet->latitude }}</td>
                                            <td>{{ $outlet->longitude }}</td>
                                            <td><img src="{{ asset($outlet->image) }}" height="50" width="50"></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
