<?php

namespace App\Http\Controllers;


use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerControlleur extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        //return view('customers', compact('customers'));
        dump($customers);
    }


}
