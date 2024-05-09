@extends('management.layouts.master')
@section('title')
My Profile -
@endsection
@section('content')
<style>
    #upload {
        opacity: 0;
    }
    #upload-label {
        position: absolute;
        top: 50%;
        left: 1rem;
        transform: translateY(-50%);
    }
    .image-area {
        border: 2px dashed rgba(255, 255, 255, 0.7);
        padding: 1rem;
        position: relative;
    }
    .image-area::before {
        content: 'Uploaded image result';
        color: #fff;
        font-weight: bold;
        text-transform: uppercase;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 0.8rem;
        z-index: 1;
    }
    .image-area img {
        z-index: 2;
        position: relative;
    }
    body {
        min-height: 100vh;
    }

</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
<div class="container-fluid px-4">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <ul class="breadcrumb breadcrumb-style ">
                        <li class="breadcrumb-item">
                            <h4 class="page-title"> My Profile</h4>
                        </li>
                    </ul>
                </div>
            </div>
            <form action="{{ route('profile.update',auth()->user()->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-8">
                        <div class="card py-4">
                            <div class="header">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="username"> <strong> User Name </strong></label>
                                        <div class="form-line">
                                            <input type="text" id="username" class="form-control" value="{{auth()->user()->username ?? ''}}" name="username" placeholder="User Name">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="first_name"> <strong> First Name </strong></label>
                                        <div class="form-line">
                                            <input type="text" id="first_name" class="form-control" value="{{auth()->user()->first_name ?? ''}}" name="first_name" placeholder="First Name">
                                        </div>
                                    </div>
                                    <div class="col-12 my-2">
                                        <label for="last_name"> <strong> Last Name </strong></label>
                                        <div class="form-line">
                                            <input type="text" id="last_name" class="form-control" value="{{auth()->user()->last_name ?? ''}}" name="last_name" placeholder="Last Name">
                                        </div>
                                    </div>
                                    <div class="col-12 my-2">
                                        <label for="email"> <strong> Email </strong></label>
                                        <div class="form-line">
                                            <input type="email" id="email" class="form-control" readonly value="{{auth()->user()->email ?? ''}}" name="email" placeholder="Enter Email">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="header">
                                <div class="row">
                                    <div class="col-12">
                                        <button class="btn btn-primary float-right"> Submit</button>
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <div class="col-lg-12 mx-auto">
                                        <div class="container">
                                            <h5>Profile Image
                                            </h5>
                                            <div class="avatar-upload">
                                                <div class="avatar-edit">
                                                    <input type='file' name="image" id="imageUpload" accept=".png, .jpg, .jpeg" />
                                                    <label for="imageUpload"></label>
                                                </div>
                                                <div class="avatar-preview">
                                                    <div id="imagePreview" style="background-image: url({{asset('images/profile').'/'.auth()->user()->image}});">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<style>
    .avatar-upload {
        position: relative;
        max-width: 205px;
        margin: 50px auto;
    }
    .avatar-upload .avatar-edit {
        position: absolute;
        right: 12px;
        z-index: 1;
        top: 10px;
    }
    .avatar-upload .avatar-edit input {
        display: none;
    }
    .avatar-upload .avatar-edit input+label {
        display: inline-block;
        width: 34px;
        height: 34px;
        margin-bottom: 0;
        border-radius: 100%;
        background: #FFFFFF;
        border: 1px solid transparent;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
        cursor: pointer;
        font-weight: normal;
        transition: all 0.2s ease-in-out;
    }
    .avatar-upload .avatar-edit input+label:hover {
        background: #f1f1f1;
        border-color: #d6d6d6;
    }
    .avatar-upload .avatar-edit input+label:after {
        content: "\f040";
        font-family: 'FontAwesome';
        color: #757575;
        position: absolute;
        top: 10px;
        left: 0;
        right: 0;
        text-align: center;
        margin: auto;
    }
    .avatar-upload .avatar-preview {
        width: 192px;
        height: 192px;
        position: relative;
        border-radius: 100%;
        border: 6px solid #F8F8F8;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
    }
    .avatar-upload .avatar-preview>div {
        width: 100%;
        height: 100%;
        border-radius: 100%;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }
</style>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imageUpload").change(function() {
        readURL(this);
    });
</script>
@endsection
