<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Site;
use App\Models\Space;
use App\Models\Optionspace;
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
        return View('space/index',compact('spacesOnSite','allsite','currentSite'));
    }

    public function showGuest($SiteId, $id){
        $space = Space::where('spaces.enabled', 1)->where('spaces.id', $id)
        ->join('prices', 'spaces.price_id', '=', 'prices.id')
        ->first();
        $site = Site::Where('enabled', 1)->Where('id', $SiteId)->first();
        $options = Option::all();
        $optionsExists = OptionSpace::where('space_id', $id)->where('available', 1)->get();
        return view('space/show',compact('space','site','options','optionsExists'));
    }
}
