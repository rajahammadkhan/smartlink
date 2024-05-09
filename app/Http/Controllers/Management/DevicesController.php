<?php

namespace App\Http\Controllers\Management;
use App\Http\Controllers\Controller;
use App\Models\Devices;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\CustomerDevice;
use App\Models\Customer;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
class DevicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $devices = Devices::get();
        return view('management.device.index',compact('devices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers=Customer::where('status',1)->get();
        return view('management.device.create',compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'android_master_mac_address' => 'required|unique:devices',
            'installation_date' => 'required',
        ]);
        $existingDevice = Devices::where('android_master_mac_address', $request->android_master_mac_address)->first();

        if ($existingDevice) {
            return redirect()->back()->withInput()->withErrors(['android_master_mac_address' => 'The android master MAC address already exists.']);
        }
        $device = new Devices();
        $device->name = $request->name;
        $device->customer_id = $request->customer_id;
        $device->android_master_mac_address = $request->android_master_mac_address;
        $device->pcb_controller_bluetooth_name = $request->pcb_controller_bluetooth_name;
        $device->device_category = $request->device_category;
        $device->installation_date = $request->installation_date;
        $device->date_of_supply = $request->date_of_supply;
        $device->status = $request->status;
        $device->save();
        if($request->customer_id){
                $customerDevice = new CustomerDevice();
                $customerDevice->customer_id = $request->customer_id;
                $customerDevice->device_id = $device->id;
                $customerDevice->status = 1;
                $customerDevice->save();
        }
        return redirect()->route('device.index')->with('success', 'Device Added Successfully');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Devices  $devices
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $device=Devices::where('id', $id)->first();
        return view('management.device.show',compact('device'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Devices  $devices
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $device=Devices::where('id', $id)->first();
        $customers=Customer::where('status',1)->get();
        return view('management.device.edit',compact('device','customers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Devices  $devices
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'android_master_mac_address' => 'required|unique:devices,android_master_mac_address,' . $id,
            'installation_date' => 'required',
        ]);

        $existingDevice = Devices::where('android_master_mac_address', $request->android_master_mac_address)
        ->where('id', '!=', $id)
        ->first();

        if ($existingDevice) {
        return redirect()->back()->withInput()->withErrors(['android_master_mac_address' => 'The android master MAC address already exists.']);
        }

        $device=Devices::where('id', $id)->first();
        $device->name = $request->name;
        $device->customer_id = $request->customer_id;
        $device->android_master_mac_address = $request->android_master_mac_address;
        $device->pcb_controller_bluetooth_name = $request->pcb_controller_bluetooth_name;
        $device->device_category = $request->device_category;
        $device->installation_date = $request->installation_date;
        $device->date_of_supply = $request->date_of_supply;
        $device->status = $request->status;
        $device->save();
        if($request->customer_id){
            CustomerDevice::where('device_id',$id)->delete();
            $customerDevice = new CustomerDevice();
            $customerDevice->customer_id = $request->customer_id;
            $customerDevice->device_id = $device->id;
            $customerDevice->status = 1;
            $customerDevice->save();
        }
        return redirect()->route('device.index')->with('success', 'Device Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Devices  $devices
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Devices::where('id', $id)->delete();
        return redirect()->back()->with('success', "Device Deleted Successfully");
    }
}
