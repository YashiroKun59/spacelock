<?php

namespace App\Http\Controllers;

use App\Models\Space;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SpaceController extends Controller
{
    //
    public function indexGuest($idSite=1)
    {
        $spacesOnSite = Space::Where('enabled', 1)->Where('site_id', $idSite);

        return View('space/index',compact('spacesOnSite'));

    }

    public function showGuest($id){
        $space = Space::where('spaces.enabled', 1)->where('spaces.id', $id)
        ->join('prices', 'spaces.id', '=', 'prices.id')
        ->first();
        return view('space/show',compact('space'));
    }
}
