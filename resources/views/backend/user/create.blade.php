@extends('backend.layouts.master')
@section('title', 'Create user')

@section('backend')
    <div class="register-box">
        <div class="register-logo">
            <a><b>{{ config('app.name') }}</b></a>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Add new user</p>

                <form action="{{ route('user.store') }}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" placeholder="Name" name="name">
                    </div>
                    <div class="form-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email">
                    </div>
                    
                    <div class="form-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                    </div>
                    <div class="row">
                        <div class="col-8">
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <br>
    <br>
@endsection