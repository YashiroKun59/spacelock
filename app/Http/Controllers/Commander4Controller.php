<?php

namespace App\Http\Controllers;

//use Barryvdh\DomPDF\PDF;

use App\Models\Rental;
use Faker\Core\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;

class Commander4Controller extends Controller
{
    /**
     *
     * @param Request $request
     * @param int $id
     * @return view
     */
    public function index(Request $request)
    {
       // Auth::user()->id;


        $user_id = 2; // $request->user_id;
        $space_id = 2; // $request->space_id;
        $recup = DB::table('users')
            ->join('rentals', 'users.id', '=', 'rentals.id')
            ->join('spaces', 'rentals.id', '=', 'spaces.id')
            ->join('prices', 'spaces.id', '=', 'prices.id')
            ->join('spacetypes', 'spaces.id', '=', 'spacetypes.id')
            ->join('sites', 'spaces.id', '=', 'sites.id')
            ->select('users.firstname',
                     'users.lastname',
                     'users.address',
                     'users.zipcode',
                     'users.city',
                     'rentals.start_at',
                     'rentals.end_at',
                     'spaces.nickname',
                     'prices.amount',
                     'sites.name',
                     'sites.adress',
                     'sites.zipcode',
                     'sites.city')
            ->where('users.id', 2)
                // ->where('space_id',1)
            ->first();


        return view('orderFour', compact('recup','space_id','user_id'));

    }

    public function createContratPDF(Request $request)
    {
        $user_id = 1; // $request->user_id;
        $space_id = 1; // $request->space_id;
        $recup = DB::table('users')
            ->join('rentals', 'users.id', '=', 'rentals.id')
            ->join('spaces', 'rentals.id', '=', 'spaces.id')
            ->join('prices', 'spaces.id', '=', 'prices.id')
            ->join('spacetypes', 'spaces.id', '=', 'spacetypes.id')
            ->join('sites', 'spaces.id', '=', 'sites.id')
            ->select(
                'users.firstname',
                'users.lastname',
                'users.address',
                'users.zipcode',
                'users.city',
                'rentals.start_at',
                'rentals.end_at',
                'spaces.nickname',
                'prices.amount',
                'sites.name',
                'sites.adress',
                'sites.zipcode',
                'sites.city'
            )
            ->where('users.id', 1)
                // ->where('space_id',1)
            ->first();

        view()->share('recup', $recup);
        $pdf = PDF::loadView('contrat', compact('recup'));
        return $pdf->download('contrat.pdf');


    }

    public function uploadFile(Request $request)
    {

       $request->validate([
        'file' => 'required|mimes:pdf,txt|max:2048',
       ]);

        $fileName = time().'.'.$request->file->extension();

        $request->file->move(public_path('contrat'), $fileName);

       //début de la requete pour mettre le pdf dans la db
       /* $rental = new Rental;
        $rental->contrat_url = $fileName;
        $rental->bill_period = $request->bil
        $rental->save();*/

        return back()//retourne sur la page orderFour mais n'affiche pas le message success
            ->with('success','File has been uploaded.')
            ->with('file', $fileName);











    }

}
