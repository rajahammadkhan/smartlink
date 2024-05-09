@extends('management.layouts.master')
@section('title')
Customer Detail
@endsection
@section('content')
<div class="container-fluid px-4">
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
            <div class="row">
                <div class="col-md-12">
                    <div class="card pt-4">
                        <div class="header">
                            <div>
                                <h6>ID</h6>
                                <p>{{$customer->unique_number ?? ''}}</p>
                            </div>
                            <div>
                                <h6>Account Name</h6>
                                <p>{{$customer->name ?? '' }}</p>
                            </div>
                            <div>
                                <h6>Legal Type</h6>
                                <p>{{$customer->legalType->type ?? '' }}</p>
                            </div>
                            <div>
                                <h6>References</h6>
                                <p>{{$customer->references->account_name ?? '' }}</p>
                            </div>
                            <div>
                                <h6>Country</h6>
                                <p>{{$customer->country->name ?? '' }}</p>
                            </div>
                            <div>
                                <h6>Incorporation Number</h6>
                                <p>{{$customer->incorporation_number ?? '' }}</p>
                            </div>
                            <div>
                                <h6>Account Email Address</h6>
                                <p><a href="mailto:{{$customer->email}}">{{$customer->email}}</a></p>
                            </div>
                            <div>
                                <h6>Account Password</h6>
                                <p>{{$customer->password ?? '' }}</p>
                            </div>
                            <div>
                                <h6>Billed By</h6>
                                <p>{{$customer->billed_by ?? '' }}</p>
                            </div>
                            <div>
                                <h6>Domain Url</h6>
                                <p>{{$customer->domain_url}}</p>
                            </div>
                            <div>
                                <h6>NTN Number</h6>
                                <p>{{$customer->ntn_number ?? '' }}</p>
                            </div>
                            <div>
                                <h6>STRN Number</h6>
                                <p>{{$customer->strn_number ?? '' }}</p>
                            </div>
                            <h6>Status</h6>
                            @if ($customer->status == 1)
                                <label class="badge badge-info" data-toggle="modal"
                                       data-target="#active_inactive">Published</label>
                            @else
                                <label class="badge badge-danger" data-toggle="modal"
                                       data-target="#active_inactive">Draft</label>
                            @endif
                            <div class="text-right">
                                <h6>Date / Time</h6>
                                <p class="m-0">{{$customer->created_at}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endsection
