<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\References;
use App\Models\Devices;
use App\Models\Customer;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $customers = Customer::where('status', 1)->count();
        $devices  = Devices::where('status',1)->count();
        $references = References::where('status',1)->count();
        return view('home',compact('customers','devices','references'));
    }
}
