<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Space;
use App\Models\Site;
use App\Models\Optionspace;
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
        ->join('prices', 'spaces.price_id', '=', 'prices.id')
        ->first();
        $site = Site::Where('enabled', 1)->Where('id', $SiteId)->first();
        $options = Option::all();
        $optionsExists = OptionSpace::where('space_id', $id)->where('available', 1);
        return view('space/show',compact('space','site','options'));
    }
}
