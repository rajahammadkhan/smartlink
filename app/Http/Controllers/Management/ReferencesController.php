<?php

namespace App\Http\Controllers\Management;
use App\Http\Controllers\Controller;
use App\Models\Countries;
use App\Models\LegalTypes;
use App\Models\References;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class ReferencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $references=References::get();
        return view('management.reference.index',compact('references'));
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
        return view('management.reference.create',compact('legalTypes','countries'));
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
            'account_name' => 'required',
            'legal_type_id' => 'required',
            'set_commision_percentage' => 'required',
        ]);
        $references = new References();
        $references->account_name = $request->account_name;
        $references->legal_type_id = $request->legal_type_id;
        $references->incorporation_number = $request->incorporation_number;
        $references->ntn_number = $request->ntn_number;
        $references->set_commision_percentage = $request->set_commision_percentage;
        $references->reference_user_account = $request->reference_user_account;
        $references->reference_user_password = $request->reference_user_password;
        $references->bank_name = $request->bank_name;
        $references->iban = $request->iban;
        $references->status = $request->status;
        $references->country_id = $request->country_id;
        $references->address = $request->address;
        $references->contact_number = $request->contact_number;
        $references->save();
        return redirect()->route('reference.index')->with('success', 'References Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\References  $references
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reference=References::where('id', $id)->first();
        return view('management.reference.show',compact('reference'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\References  $references
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $legalTypes=LegalTypes::get();
        $countries=Countries::get();
        $reference=References::where('id', $id)->first();
        return view('management.reference.edit',compact('reference','legalTypes','countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\References  $references
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, References $references)
    {
        $request->validate([
            'account_name' => 'required',
            'legal_type_id' => 'required',
            'set_commision_percentage' => 'required',
        ]);
        $references = References::where('id', $id)->first();
        $references->account_name = $request->account_name;
        $references->legal_type_id = $request->legal_type_id;
        $references->incorporation_number = $request->incorporation_number;
        $references->ntn_number = $request->ntn_number;
        $references->set_commision_percentage = $request->set_commision_percentage;
        $references->reference_user_account = $request->reference_user_account;
        $references->reference_user_password = $request->reference_user_password;
        $references->bank_name = $request->bank_name;
        $references->iban = $request->iban;
        $references->status = $request->status;
        $references->country_id = $request->country_id;
        $references->address = $request->address;
        $references->contact_number = $request->contact_number;
        $references->save();
        return redirect()->route('reference.index')->with('success', 'References Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\References  $references
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        References::where('id', $id)->delete();
        return redirect()->back()->with('success', "References Deleted Successfully");
    }
}
