@extends('backend.layouts.master')
@section('title', 'Update Admin')

@section('backend')
    <div class="register-box">
        <div class="register-logo">
            <a><b>{{ config('app.name') }}</b></a>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Edit supportive member</p>

                <form action="{{ route('admin.updateAdmin', $admin) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="{{ $admin->name }}" name="name">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="{{ $admin->phone }}" name="phone">
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" value="{{ $admin->email }}" name="email">
                    </div>
                    <div class="input-group mb-3">
                        <textarea type="text" rows="2" class="form-control" name="address">
                                                {{ $admin->address }}
                                            </textarea>
                    </div>
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" name="image">
                        @if ($admin->image)
                            <img src="{{ asset($admin->image) }}" height="100" width="100" alt="User logo">
                        @endif
                    </div>
                    {{-- <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Respective Admin Role / Access</h3>
                        </div>
                        <div class="card-body">
                            <!-- Minimal style -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- checkbox -->
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="checkbox" id="admin" name="admin" value="1"
                                                @if ($admin->admin === 1) {{ 'checked' }} @endif>
                                            <label for="admin">
                                                Admin
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- checkbox -->
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="checkbox" id="company_info" name="company_info" value="1"
                                                @if ($admin->company_info === 1) {{ 'checked' }} @endif>
                                            <label for="company_info">
                                                Company Info
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Minimal style -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- checkbox -->
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="checkbox" id="rating_review" name="rating_review" value="1"
                                                @if ($admin->rating_review === 1) {{ 'checked' }} @endif>
                                            <label for="rating_review">
                                                Rating & Review
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- checkbox -->
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="checkbox" id="main_menu" name="main_menu" value="1"
                                                @if ($admin->main_menu === 1) {{ 'checked' }} @endif>
                                            <label for="main_menu">
                                                Main Menu
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Minimal style -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- checkbox -->
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="checkbox" id="product" name="product" value="1"
                                                @if ($admin->product === 1) {{ 'checked' }} @endif>
                                            <label for="product">
                                                Product
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- checkbox -->
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="checkbox" id="coupon" name="coupon" value="1"
                                                @if ($admin->coupon === 1) {{ 'checked' }} @endif>
                                            <label for="coupon">
                                                Coupon
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Minimal style -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- checkbox -->
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="checkbox" id="shipping_charge" name="shipping_charge" value="1"
                                                @if ($admin->shipping_charge === 1) {{ 'checked' }} @endif>
                                            <label for="shipping_charge">
                                                Shipping Charge
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- checkbox -->
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="checkbox" id="order_history" name="order_history" value="1"
                                                @if ($admin->order_history === 1) {{ 'checked' }} @endif>
                                            <label for="order_history">
                                                Order History
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Minimal style -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- checkbox -->
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="checkbox" id="slider" name="slider" value="1" @if($admin->slider === 1) {{ 'checked' }} @endif>
                                            <label for="slider">
                                                Main Slider
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <hr>
                    <div class="row">
                        <div class="col-8">
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Update</button>
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