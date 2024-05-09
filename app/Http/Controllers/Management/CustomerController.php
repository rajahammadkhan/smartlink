<?php

namespace App\Http\Controllers\Management;
use App\Http\Controllers\Controller;
use App\Models\LegalTypes;
use App\Models\Countries;
use App\Models\References;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer=Customer::get();
        return view('management.customer.index',compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $legalTypes=LegalTypes::get();
        $countries=Countries::get();
        $references=References::where('status',1)->get();
        return view('management.customer.create',compact('legalTypes','countries','references'));
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
            'email' => 'required',
            'password' => 'required',
        ]);
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->legal_type_id  = $request->legal_type_id;
        $customer->country_id  = $request->country_id;
        $customer->incorporation_number = $request->incorporation_number;
        $customer->ntn_number = $request->ntn_number;
        $customer->strn_number = $request->strn_number;
        $customer->email = $request->email;
        $customer->password = $request->password;
        $customer->current_user = $request->current_user;
        $customer->unique_reference_id = $request->unique_reference_id;
        $customer->billed_by = $request->billed_by;
        $customer->domain_url = $request->domain_url;
        $customer->status = $request->status;
        $customer->save();
        return redirect()->route('customer.index')->with('success', 'Customer Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer=Customer::where('id', $id)->first();
        return view('management.customer.show',compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer=Customer::where('id', $id)->first();
        $legalTypes=LegalTypes::get();
        $countries=Countries::get();
        $references=References::where('status',1)->get();
        return view('management.customer.edit',compact('customer','legalTypes','countries','references'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        $customer = Customer::where('id', $id)->first();
        $customer->name = $request->name;
        $customer->legal_type_id  = $request->legal_type_id;
        $customer->country_id  = $request->country_id;
        $customer->incorporation_number = $request->incorporation_number;
        $customer->ntn_number = $request->ntn_number;
        $customer->strn_number = $request->strn_number;
        $customer->email = $request->email;
        $customer->password = $request->password;
        $customer->current_user = $request->current_user;
        $customer->unique_reference_id = $request->unique_reference_id;
        $customer->billed_by = $request->billed_by;
        $customer->domain_url = $request->domain_url;
        $customer->status = $request->status;
        $customer->save();
        return redirect()->route('customer.index')->with('success', 'Customer Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customer::where('id', $id)->delete();
        return redirect()->back()->with('success', "Customer Deleted Successfully");
    }
}
