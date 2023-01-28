<?php

namespace App\Http\Controllers;

use App\Models\Space;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    public function order_two()

    {

        /*if(Auth::user()->role_id !== 1 && Auth::user()->role_id !== 2){

            return 'Error not allowed to perform this action';
        }
        if(Auth::user()->role_id <= 0 && Auth::user()->role_id >= 4){

            return 'Error bad role ID';
        }*/
        # TODO Check if user not login return role_id of zero or null

        $space_id = htmlspecialchars(request('spaceId')) ;
        if(Space::all()->where('id','=',$space_id)->count()!==1){
            return 'Error bad space';
        }
        // On sait ici que le custormer existe
        if(Auth::user()->role_id === 3){
            return view('orderTwo',compact('space_id'));
        }
    }
    public function order_three()
    {
        $space_id = htmlspecialchars(request('spaceId')) ;
        if(Space::all()->where('id','=',$space_id)->count()!==1){
            return 'Error bad space';
        }
        if(Auth::user()->role_id === 3){
            return view('orderThree',compact('spaceId'));
        }
    }
    public function order_four()
    {
        $space_id = htmlspecialchars(request('spaceId')) ;
        if(Space::all()->where('id','=',$space_id)->count()!==1){
            return 'Error bad space';
        }
        if(Auth::user()->role_id === 3){
            return view('orderFour',compact('spaceId'));
        }
    }
    public function order_five()
    {
        $space_id = htmlspecialchars(request('spaceId')) ;
        if(Space::all()->where('id','=',$space_id)->count()!==1){
            return 'Error bad space';
        }
        if(Auth::user()->role_id === 3){
            return view('orderFive',compact('spaceId'));
        }
    }


    public function Placeholder()
    {
        $space_id = htmlspecialchars(request('spaceId')) ; /* Rajouter la verification champs compte */
        if(Space::all()->where('id','=',$space_id)->count()!==1){
            return 'Error bad space';
        }

        return redirect('/orderThree')->compact('spaceId');
    }
}
