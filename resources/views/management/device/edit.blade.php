@extends('management.layouts.master')
@section('title')
Device Edit - {{ config('app.dashboard') }}
@endsection
@section('content')
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
        <form action="{{ route('device.update',$device->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-8">
                    <div class="card py-4">
                        <div class="header">
                            <div class="row">
                                <div class=" col-12">
                                    <label for="email_address1"> <strong> Device Name </strong></label>
                                    <div class="form-line">
                                        <input value="{{$device->name ?? ''}}" type="text" id="name" class="form-control" name="name" placeholder="Device Name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class=" col-12">
                                    <label for="email_address1"> <strong> Android Master Mac Address </strong></label>
                                    <div class="form-line">
                                        <input value="{{$device->android_master_mac_address ?? ''}}" type="text" id="android_master_mac_address" class="form-control" name="android_master_mac_address" placeholder="Android Master Mac Address" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class=" col-12">
                                    <label for="email_address1"> <strong> PCB Controller Bluetooth Name </strong></label>
                                    <div class="form-line">
                                        <input value="{{$device->pcb_controller_bluetooth_name ?? ''}}" type="text" id="pcb_controller_bluetooth_name" class="form-control" name="pcb_controller_bluetooth_name" placeholder="PCB Controller Bluetooth Name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class=" col-12">
                                    <label for="email_address1"> <strong> Aynchronised Asset Code </strong></label>
                                    <div class="form-line">
                                        <input value="{{$device->synchronised_asset_code ?? ''}}" readonly type="text" id="synchronised_asset_code" class="form-control" name="synchronised_asset_code" placeholder="Aynchronised Asset Code" required>
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
                            <div class="row">
                                <div class=" col-12">
                                    <label for="status"><strong>Device Status </strong></label>
                                    <select class="form-control select2" name="status" id="status" data-placeholder="Select">
                                        <option {{$device->status == '1' ? 'selected' : ''}} value="1">Publish</option>
                                        <option {{$device->status == '0' ? 'selected' : ''}} value="0">Draft</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class=" col-12">
                                    <label for="device_category"><strong>Device Category </strong></label>
                                    <select class="form-control select2" name="device_category" id="device_category" data-placeholder="Select">
                                        <option {{$device->device_category == 'basic' ? 'selected' : ''}} value="basic">Basic Version</option>
                                        <option {{$device->device_category == 'advanced' ? 'selected' : ''}} value="advanced">Advanced Version</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="customer_id"><strong>Customers </strong></label>
                                    <select class="form-control select2" required name="customer_id" id="customer_id" data-placeholder="Select">
                                        @foreach ($customers as $customer)
                                        <option value={{$customer->id}}>{{$customer->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class=" col-12">
                                    <label for="device_category"><strong>Installation Date </strong></label>
                                    <input type="date" value="{{$device->installation_date ?? ''}}" id="installation_date" class="form-control" name="installation_date" required>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class=" col-12">
                                    <label for="device_category"><strong>Date Of Supply</strong></label>
                                    <input type="date" value="{{$device->date_of_supply ?? ''}}" id="date_of_supply" class="form-control" name="date_of_supply" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @endsection
