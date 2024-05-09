@extends('management.layouts.master')
@section('title')
References Detail
@endsection
@section('content')
<div class="container-fluid px-4">
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
            <div class="row">
                <div class="col-md-12">
                    <div class="card pt-4">
                        <div class="header">
                            <div>
                                <h6>ID</h6>
                                <p>{{$reference->unique_number ?? ''}}</p>
                            </div>
                            <div>
                                <h6>Account Name</h6>
                                <p>{{$reference->account_name ?? '' }}</p>
                            </div>
                            <div>
                                <h6>Legal Type</h6>
                                <p>{{$reference->legalType->type ?? '' }}</p>
                            </div>
                            <div>
                                <h6>Country</h6>
                                <p>{{$reference->country->name ?? '' }}</p>
                            </div>
                            <div>
                                <h6>Incorporation Number</h6>
                                <p>{{$reference->incorporation_number ?? '' }}</p>
                            </div>
                            <div>
                                <h6>Contact Number</h6>
                                <p>{{$reference->contact_number ?? '' }}</p>
                            </div>
                            <div>
                                <h6>Commision Percentage</h6>
                                <p>{{$reference->set_commision_percentage ?? '' }}</p>
                            </div>
                            <div>
                                <h6>Bank Name</h6>
                                <p>{{$reference->bank_name ?? '' }}</p>
                            </div>
                            <div>
                                <h6>IBAN</h6>
                                <p>{{$reference->iban ?? '' }}</p>
                            </div>
                            <div>
                                <h6>Account Email Address</h6>
                                <p><a href="mailto:{{$reference->reference_user_account}}">{{$reference->reference_user_account}}</a></p>
                            </div>
                            <div>
                                <h6>Account Password</h6>
                                <p>{{$reference->reference_user_password ?? '' }}</p>
                            </div>
                            <div>
                                <h6>Address</h6>
                                <p>{{$reference->address ?? '' }}</p>
                            </div>
                            <h6>Status</h6>
                            @if ($reference->status == 1)
                                <label class="badge badge-info" data-toggle="modal"
                                       data-target="#active_inactive">Published</label>
                            @else
                                <label class="badge badge-danger" data-toggle="modal"
                                       data-target="#active_inactive">Draft</label>
                            @endif
                            <div class="text-right">
                                <h6>Date / Time</h6>
                                <p class="m-0">{{$reference->created_at}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endsection
