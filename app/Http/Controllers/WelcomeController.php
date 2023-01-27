<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Space;


class WelcomeController extends Controller
{
    public function indexGuest()
    {
        $spaces = Space::where('enabled', 1)
            ->inRandomOrder()
            ->limit(5)
            ->get();
        return view('welcome',compact('spaces'));
    }
}
