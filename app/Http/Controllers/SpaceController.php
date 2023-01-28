<?php

namespace App\Http\Controllers;

use App\Models\Site;
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
        $allsite=Site::select('id','city')
        ->where('enabled',1)
        ->get();
        $currentSite = $SiteId;
        return view('catalog.index',compact('spacesOnSite','allsite','currentSite'));
    }

    public function showGuest($SiteId, $id){
        $space = Space::where('spaces.enabled', 1)->where('spaces.id', $id)
        ->join('prices', 'spaces.id', '=', 'prices.id')
        ->first();
        return view('catalog.show',compact('space'));
    }
}
