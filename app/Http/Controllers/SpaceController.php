<?php

namespace App\Http\Controllers;

use App\Models\Space;
use Illuminate\Http\Request;
//use Illuminate\View\View;
use Illuminate\Support\Facades\View;

class SpaceController extends Controller
{
    //
    public function index($idSite=1){
        $spacesOnSite = Space::Where('enabled', 1)->Where('site_id', $idSite)->get();
        return View('space/index',compact('spacesOnSite'));
    }

    public function show($id){
         $space = Space::where('enabled', 1)->where('id', $id)
            ->get();
            return view('space/show',compact('space'));
        }
}
