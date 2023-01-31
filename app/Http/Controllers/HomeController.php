<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Mail\ContactMailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Payement;
use App\Models\Support;

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
    public function homecontact()
    {
        return view('contact');
    }
    public function submit_homecontact()
    {
        $email = request('email');
        $nom = request('nom');
        $prenom = request('prenom');
        $question = request('question');

        //Mail to should be same as from with same domain as postmark account because this is a trial account
        Mail::to("example@domain.com")->send(new ContactMailable( $email, $nom, $prenom, $question));

        return view('contact')->with('successMsg','Message envoyé');
    }
    public function support()
    {
        $rentId = request('rentId');
        $user = User::all()->where('id', '=', Auth::user()->id)->first();
        $rental = Rental::all()->where('id', '=', $rentId)->first();
        $payements = Payement::all()->where('rental_id', '=', $rentId);

        #Log::debug('rental id:'.$rentId);

        if($payements->isEmpty()) {
            return view('support')->with('errorMsg','Veuillez finaliser votre paiement');
        }
        else {
            return view('support');
        }
    }

    public function submit_support()
    {
        $rentId = request('rentId');
        $question = request('question');
        $user = User::all()->where('id', '=', Auth::user()->id)->first();
        $rental = Rental::all()->where('id', '=', $rentId)->first();
        $payements = Payement::all()->where('rental_id', '=', $rentId);

        if($payements->isEmpty()) {
            return view('support')->with('errorMsg','Veuillez finaliser votre paiement');
        }
        else {
            $newSupport = new Support;
            $newSupport->user_id = $user->id;
            $newSupport->status = 1;
            $newSupport->rental_id = $rentId;
            $newSupport->number = time();
            $newSupport->message = $question;
            $newSupport->from_manager = 0;
            $newSupport->enabled = 1;

            $newSupport->save();

            return view('support')->with('successMsg','Message envoyé');
        }
    }
}
