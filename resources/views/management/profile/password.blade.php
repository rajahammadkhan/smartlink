@extends('management.layouts.master')
@section('title')
        Change Password - {{config('app.name')}}    
@endsection
@section('content')
<div class="container-fluid px-4">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <ul class="breadcrumb breadcrumb-style ">
                        <li class="breadcrumb-item">
                            <h4 class="page-title">Change Password</h4>
                        </li>
                    </ul>
                </div>
            </div>
            <form action="{{ route('profile.password', auth()->user()->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="card py-4">
                            <div class="header">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="password"> <strong> Current Password </strong></label>
                                        <div class="form-line">
                                            <input type="password" id="password" class="form-control"  name="password" placeholder="Enter Current Password">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="new_password"> <strong> New Password </strong></label>
                                        <div class="form-line">
                                            <input type="password" id="new_password" class="form-control" name="new_password" placeholder="New Password">
                                        </div>
                                    </div>
                                    <div class="col-12 my-2">
                                        <label for="confirm_password"> <strong> Confirm New Password</strong></label>
                                        <div class="form-line">
                                            <input type="password" id="confirm_password" class="form-control" name="confirm_password" placeholder="Confirm New Password">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary float-right"> Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
@endsection
