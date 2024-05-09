@extends('management.layouts.master')
@section('title')
Device Detail
@endsection
@section('content')
<div class="container-fluid px-4">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Device</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('device.index') }}"> Back</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card pt-4">
                        <div class="header">
                            <div>
                                <h6>ID</h6>
                                <p>{{$device->unique_number ?? ''}}</p>
                            </div>
                            <div>
                                <h6>Account Name</h6>
                                <p>{{$device->name ?? '' }}</p>
                            </div>
                            <div>
                                <h6>Customer</h6>
                                <p>{{$device->customer->name ?? '' }}</p>
                            </div>
                            <div>
                                <h6>Device Category</h6>
                                <p>{{$device->device_category ?? '' }}</p>
                            </div>
                            <div>
                                <h6>Android Master Mac Address</h6>
                                <p>{{$device->android_master_mac_address ?? '' }}</p>
                            </div>
                            <div>
                                <h6>PCB Controller Bluetooth Name</h6>
                                <p>{{$device->pcb_controller_bluetooth_name ?? '' }}</p>
                            </div>
                            <div>
                                <h6>Aynchronised Asset Code</h6>
                                <p>{{$device->synchronised_asset_code ?? '' }}</p>
                            </div>
                            <div>
                                <h6>Installation Date</h6>
                                <p>{{$device->installation_date ?? '' }}</p>
                            </div>
                            <div>
                                <h6>Date Of Supply</h6>
                                <p>{{$device->date_of_supply ?? '' }}</p>
                            </div>
                            <h6>Status</h6>
                            @if ($device->status == 1)
                                <label class="badge badge-info" data-toggle="modal"
                                       data-target="#active_inactive">Published</label>
                            @else
                                <label class="badge badge-danger" data-toggle="modal"
                                       data-target="#active_inactive">Draft</label>
                            @endif
                            <div class="text-right">
                                <h6>Date / Time</h6>
                                <p class="m-0">{{$device->created_at}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endsection
