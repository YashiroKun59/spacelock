<?php

namespace App\Http\Controllers;

use App\Models\Space;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SpaceController extends Controller
{
    //
    public function index($idSite=1)
    {
        $spacesOnSite = Space::Where('enabled', 1)->Where('site_id', $idSite);

        return View();

    }
}
