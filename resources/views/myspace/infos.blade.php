@extends('layouts.default')
@section('title') Mes infos @endsection
@section('description') Retrovez ici vos informations de compte @endsection
@section('keywords') infos dashboard spacelock @endsection
@section('canonical'){{ URL::current() }}@endsection
@section('content')

    <main>
        <div class="container">
            <div class="container">
                <h1>Bienvenue {{ Auth::user()->firstname }} - <a href="/home/locations">Locations</a></h1>
                <p>Email : {{ Auth::user()->email }}</p>
                <p>Nom : {{ Auth::user()->firstname }}</p>
                <p>Prénom : {{ Auth::user()->lastname }}</p>
            </div>
            <hr>
            <div class="container">
                <h2 class="mb-4">Changement de mot de passe.</h2>
                <form class="" action="/updatecustomer" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="newpassword">Nouveau mot de passe:</label>
                        <input class="form-control mb-4" type="password" placeholder="nouveau mot de passe" name="newpassword" id="newpassword">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="confirmpassword">Confirmer nouveau mot de passe:</label>
                        <input class="form-control mb-4" type="password" placeholder="nouveau mot de passe" name="confirmpassword" id="confirmpassword">
                    </div>
                    <div class="mb-3">
                        <p hidden id="errormessage"></p>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            @if (Auth::user()->data_collection === 0)
                            <input class="form-check-input" autocomplete="false" checked='false' type="checkbox" name="datacollection" id="datacollection">
                            @else
                            <input class="form-check-input" autocomplete="false" checked='true' type="checkbox"name="datacollection" id="datacollection">
                            @endif
                          <label class="form-check-label" for="">Autoriser la collection de données <a href="#">?</a></label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button class="form-control" id="submitchanges" hidden="false">Confirmer</button>
                    </div>
                </form>
            </div>
        </div>
    </main>



<script type="text/javascript" src="{{asset('js/myspace/passwordchangecheck.js')}}"></script>

@stop
