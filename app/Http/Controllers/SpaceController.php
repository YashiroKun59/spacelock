<?php

namespace App\Http\Controllers;

use App\Models\Space;
use Illuminate\Http\Request;
//use Illuminate\View\View;
use Illuminate\Support\Facades\View;

class SpaceController extends Controller
{
    //
    public function indexGuest($SiteId=null){
        if($SiteId == null){
            $spacesOnSite = Space::where('enabled', 1)
            ->inRandomOrder()
            ->limit(1)
            ->get();
        }else{
            $spacesOnSite = Space::Where('enabled', 1)->Where('site_id', $SiteId)->get();
        }
        return View('space/index',compact('spacesOnSite'));
    }

    public function showGuest($SiteId, $id){
        $space = Space::where('spaces.enabled', 1)->where('spaces.id', $id)
        ->join('prices', 'spaces.id', '=', 'prices.id')
        ->first();
        return view('space/show',compact('space'));
    }
}
