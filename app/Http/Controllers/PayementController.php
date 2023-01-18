<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payement;

class PayementController extends Controller
{
    public function index(){
        $payements = Payement::all();
        dump($payements);
    }
}
