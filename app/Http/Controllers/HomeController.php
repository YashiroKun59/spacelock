<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{

    public function index()
    {
        return view('myspace.infos');
    }

    public function update_customer()
    {

        $datacollection = htmlspecialchars(request('datacollection'));

        $newpassword = request('newpassword');
        $newpasswordconfirm = request('confirmpassword');
        $updatepass = true;

        if ($newpassword === '' && $newpasswordconfirm === '')
        {
            $updatepass = false;
        }
        $user = User::all()->where('id', '=', Auth::user()->id)->first();
        // update password
        if ($updatepass)
        {
            if ($newpassword !== $newpasswordconfirm)
            {
                return "Passwod are not the sames"; # Todo handle this error
            }
            $user->password = Hash::make($newpassword);
            if(!$user->save()){
                return 'error saving new user password';
            }
        }
        // update data collection
        if($datacollection === 'on')
        {
            $user->data_collection = 1;
        }
        if ($datacollection === "")
        {
            $user->data_collection = 0;
        }
        if(!$user->save())
        {
            return 'error saving new user data collection status';
        }

        return redirect('/home/');
    }
    public function locations()
    {
        $rentals = Rental::all()->where('user_id', '=', Auth::user()->id);

        return view('myspace/locations',compact('rentals'));
    }
}
