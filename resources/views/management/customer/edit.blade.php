@extends('management.layouts.master')
@section('title')
Customer Edit - {{ config('app.dashboard') }}
@endsection
@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Customer</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('customer.index') }}"> Back</a>
                </div>
            </div>
        </div>
        <form action="{{ route('customer.update',$customer->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-8">
                    <div class="card py-4">
                        <div class="header">
                            <div class="row">
                                <div class=" col-12">
                                    <label for="name"> <strong>Name </strong></label>
                                    <div class="form-line">
                                        <input value="{{$customer->name ?? ''}}" type="text" id="name" class="form-control" name="name" placeholder="Enter Name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class=" col-12">
                                    <label for="email"> <strong>Customer Login Email Address </strong></label>
                                    <div class="form-line">
                                        <input value="{{$customer->email ?? ''}}" type="email" id="email" class="form-control" name="email" placeholder="Customer Login Email Address" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class=" col-12">
                                    <label for="password"> <strong>Customer Login Password </strong></label>
                                    <div class="form-line">
                                        <input value="{{$customer->password ?? ''}}" type="password" id="password" class="form-control" name="password" placeholder="Customer Login Password" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class=" col-12">
                                    <label for="email_address1"> <strong> Billed By </strong></label>
                                    <div class="form-line">
                                        <input value="{{$customer->billed_by ?? ''}}" type="text" id="billed_by" class="form-control" name="billed_by" placeholder="Billed By" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class=" col-12">
                                    <label for="email_address1"> <strong> Domain Url </strong></label>
                                    <div class="form-line">
                                        <input value="{{$customer->domain_url ?? ''}}" type="text" id="domain_url" class="form-control" name="domain_url" placeholder="Domain Url" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class=" col-12">
                                    <label for="email_address1"> <strong> Current User </strong></label>
                                    <div class="form-line">
                                        <input value="{{$customer->current_user ?? ''}}" type="text" id="current_user" class="form-control" name="current_user" placeholder="Current User" required>
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
                                    <div>
                                        <button class="btn btn-primary float-right"> Submit</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class=" col-12">
                                    <label for="status"><strong>Customer Status </strong></label>
                                    <select class="form-control select2" name="status" id="status" data-placeholder="Select">
                                        <option {{$customer->status == '1' ? 'selected' : ''}} value="1">Publish</option>
                                        <option {{$customer->status == '0' ? 'selected' : ''}} value="0">Draft</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class=" col-12">
                                    <label for="legal_type_id"><strong>Legal Type </strong></label>
                                    <select class="form-control select2" name="legal_type_id" id="legal_type_id" data-placeholder="Select">
                                        @foreach ($legalTypes as $legalType)
                                        <option {{$customer->legal_type_id == $legalType->id ? 'selected' : ''}} value={{$legalType->id}}>{{$legalType->type}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class=" col-12">
                                    <label for="unique_reference_id"><strong>Reference </strong></label>
                                    <select class="form-control select2" name="unique_reference_id" id="unique_reference_id" data-placeholder="Select">
                                        @foreach ($references as $reference)
                                        <option {{$customer->unique_reference_id == $reference->id ? 'selected' : ''}} value={{$reference->id}}>{{$reference->account_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class=" col-12">
                                    <label for="country_id"><strong>Country </strong></label>
                                    <select class="form-control select2" name="country_id" id="country_id" data-placeholder="Select">
                                        @foreach ($countries as $country)
                                        <option {{$customer->country_id == $country->id ? 'selected' : ''}} value={{$country->id}}>{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class=" col-12">
                                    <label for="incorporation_number"><strong>Incorporation Number </strong></label>
                                    <input type="number" value="{{$customer->incorporation_number ?? ''}}" id="incorporation_number" class="form-control" name="incorporation_number" placeholder="Incorporation Number" required>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class=" col-12">
                                    <label for="ntn_number"><strong>NTN Number</strong></label>
                                    <input type="number" value="{{$customer->ntn_number ?? ''}}" id="ntn_number" class="form-control" name="ntn_number" placeholder="NTN Number" required>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class=" col-12">
                                    <label for="strn_number"><strong>STRN Number</strong></label>
                                    <input type="number" value="{{$customer->strn_number ?? ''}}" id="strn_number" class="form-control" name="strn_number" placeholder="STRN Number" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @endsection
