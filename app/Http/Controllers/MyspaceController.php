<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Rental;

class MyspaceController extends Controller
{
    /**
     * Summary of myspace
     * @param mixed $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function home()
    {
        # code...
    }
    public function infos($email = null)
    {
        # default redirect
        if ($email === null) {
            return redirect('login', 302);
        }
        # check user is login
        # TODO check user is login (call login fun)
        if (false) {
            #send to login page
        }
        #check if user exist

        $email = htmlspecialchars($email);
        #PLACEHOLDER
        $email_exist = Customer::all('email', 'lastname', 'firstname', 'data_collection')->where('email', '=', $email)->first(); # TODO use a proper method
        if (!$email_exist) {
            return redirect('login', 302);
        }
        #PLACEHOLDER
        error_log('loggin in :' . $email);
        # TODO check user is enabled
        if (false) {
            #send to error message
        }

        # TODO prepare data for this user

        $lastname = $email_exist->lastname;
        $firstname = $email_exist->firstname;
        $data_collection = $email_exist->data_collection;

        return view('myspace/infos', compact('firstname', 'lastname', 'email', 'data_collection'));
    }

    public function locations($email = null)
    {
        if ($email === null)
        {
            return "bad email";
        }
        $customer = Customer::all()->where('email','=',$email)->first();
        $customerlastname = $customer->lastname;
        $customerfirstname = $customer->firstname;
        $rentals = Rental::all()->where('customer_id', '=', $customer->id);

        return view('myspace/locations',compact('rentals','customerlastname','customerfirstname'));
    }

    public function updatecustomer()
    {
        # TODO check autenthication

        $email = htmlspecialchars(request('email'));
        $customer = Customer::all(['*'])->where('email', '=', $email)->first();
        $datacollection = htmlspecialchars(request('datacollection'));
        $updatepass = true;
        # TODO check on input
        $oldpassword = request('oldpassword');
        $newpassword = request('newpassword');
        $newpasswordconfirm = request('confirmpassword');
        error_log("'" . $oldpassword . "'");
        if ($oldpassword !== $customer->password) {
            return "current password incorrect";
        }
        if ($newpassword === null) {
            error_log('update hit');
            $updatepass = false;
        }
        if ($newpassword !== $newpasswordconfirm) {
            return "Passwod are not the sames"; # Todo handle this error

        }
        if ($customer->password === $newpassword) {
            return "passwords cannot be the same";
        }

        if ($updatepass) {
            $customer->password = $newpassword;
        }
        if ($datacollection === 1) {
            $customer->data_collection = $datacollection;
        } else {
            $customer->data_collection = 0;
        }
        $udpate = $customer->save();
        error_log('update status :' . $udpate);
        return redirect('/myspace/' . $email,);
    }
}
