@extends('management.layouts.master')
@section('title')
Reference Edit - {{ config('app.dashboard') }}
@endsection
@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Reference</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('reference.index') }}"> Back</a>
                </div>
            </div>
        </div>
        <form action="{{ route('reference.update',$reference->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-8">
                    <div class="card py-4">
                        <div class="header">
                            <div class="row">
                                <div class=" col-12">
                                    <label for="account_name"> <strong> Account Name </strong></label>
                                    <div class="form-line">
                                        <input value="{{$reference->account_name ?? ''}}" type="text" id="account_name" class="form-control" name="account_name" placeholder="Account Name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class=" col-12">
                                    <label for="email_address1"> <strong> Local Tax ID Number </strong></label>
                                    <div class="form-line">
                                        <input value="{{$reference->ntn_number ?? ''}}" type="text" id="ntn_number" class="form-control" name="ntn_number" placeholder="Local Tax ID Number" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class=" col-12">
                                    <label for="email_address1"> <strong> Commision Percentage </strong></label>
                                    <div class="form-line">
                                        <input value="{{$reference->set_commision_percentage ?? ''}}" type="text" id="set_commision_percentage" class="form-control" name="set_commision_percentage" placeholder="Commision Percentage" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class=" col-12">
                                    <label for="email_address1"> <strong> Address </strong></label>
                                    <div class="form-line">
                                        <input value="{{$reference->address ?? ''}}" type="text" id="address" class="form-control" name="address" placeholder="Address" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class=" col-12">
                                    <label for="email_address1"> <strong> Account Email Address </strong></label>
                                    <div class="form-line">
                                        <input value="{{$reference->reference_user_account ?? ''}}" type="text" id="reference_user_account" class="form-control" name="reference_user_account" placeholder="Account Email Address" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class=" col-12">
                                    <label for="email_address1"> <strong> Account Password </strong></label>
                                    <div class="form-line">
                                        <input value="{{$reference->reference_user_password ?? ''}}" type="text" id="reference_user_password" class="form-control" name="reference_user_password" placeholder="Account Password" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class=" col-12">
                                    <label for="email_address1"> <strong> Bank Name </strong></label>
                                    <div class="form-line">
                                        <input value="{{$reference->bank_name ?? ''}}" type="text" id="bank_name" class="form-control" name="bank_name" placeholder="Bank Name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class=" col-12">
                                    <label for="email_address1"> <strong> IBAN </strong></label>
                                    <div class="form-line">
                                        <input value="{{$reference->iban ?? ''}}" type="text" id="iban" class="form-control" name="iban" placeholder="IBAN" required>
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
                                        <button class="btn btn-primary  my-2 float-right"> Submit</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class=" col-12">
                                    <label for="status"><strong>Reference Status </strong></label>
                                    <select class="form-control select2" name="status" id="status" data-placeholder="Select">
                                        <option {{$reference->status == '1' ? 'selected' : ''}} value="1">Publish</option>
                                        <option {{$reference->status == '0' ? 'selected' : ''}} value="0">Draft</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class=" col-12">
                                    <label for="legal_type_id"><strong>Legal Type </strong></label>
                                    <select class="form-control select2" name="legal_type_id" id="legal_type_id" data-placeholder="Select">
                                        @foreach ($legalTypes as $legalType)
                                        <option {{$reference->legal_type_id == $legalType->id ? 'selected' : ''}} value={{$legalType->id}}>{{$legalType->type}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class=" col-12">
                                    <label for="country_id"><strong>Country </strong></label>
                                    <select class="form-control select2" name="country_id" id="country_id" data-placeholder="Select">
                                        @foreach ($countries as $country)
                                        <option {{$reference->country_id == $country->id ? 'selected' : ''}} value={{$country->id}}>{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class=" col-12">
                                    <label for="incorporation_number"><strong>Incorporation Number </strong></label>
                                    <input type="number" id="incorporation_number" class="form-control" name="incorporation_number" value="{{$reference->incorporation_number ?? ''}}" placeholder="Incorporation Number" required>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class=" col-12">
                                    <label for="contact_number"><strong>Contact Number</strong></label>
                                    <input type="number" id="contact_number" class="form-control" name="contact_number" value="{{$reference->contact_number ?? ''}}" placeholder="Contact Number" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @endsection
