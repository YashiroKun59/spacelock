<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Space;


class WelcomeController extends Controller
{
    public function index()
    {
        $spaces = Space::where('enabled', 1)
            ->inRandomOrder()
            ->limit(3)
            ->get();
        return view('welcome',compact('spaces'));
    }
}
