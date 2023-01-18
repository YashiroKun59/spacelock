<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Space;

class SpaceController extends Controller
{
    public function index() {
        $spaces = Space::all();
        dump($spaces);
    }
}
