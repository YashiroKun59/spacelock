@extends('layouts.default')
@section('title') Taper ici le title de la page @endsection
@section('description') Taper ici la description @endsection
@section('keywords') Taper ici les mots-clés @endsection
@section('canonical'){{ URL::current() }}@endsection
@section('content')

<main id="main">

<div class="container-fluid" style="width: 70%">
    <div class="progress" role="progressbar" aria-label="Animated striped" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
        <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 100%"></div>
    </div>
</div>
<!--Si aucun utilisateur est connecté-->
@if (!Auth::check())

<form method="POST" action="route('register')">
    @csrf
    <div class = "container">
        <div class = "row">
            <div class = "col-6">
                <label for ="firstname" class="form-label">Firstname</label>
                <input type="text" name="firstname"  class="form-control"><br>
                <label for ="address" class="form-label">Address</label>
                <input type="text" name="address"  class="form-control"><br>
                <label for ="zipcode" class="form-label">Zipcode</label>
                <input type="text" name="zipcode"  class="form-control"><br>
                <label for ="zipcode" class="form-label">Email</label>
                <input type="text" name="email"  class="form-control"><br>
            </div>
            <div class = "col-6">
                <label for ="lastname" class="form-label">Lastname</label>
                <input type="text" name="lastname" class="form-control"><br>
                <label for ="city" class="form-label">City</label>
                <input type="text" name="city"  class="form-control"><br>
                <label for ="zipcode" class="form-label">Phone</label>
                <input type="text" name="phone"  class="form-control"><br>
                <label for ="zipcode" class="form-label">Password</label>
                <input type="password" name="password"  class="form-control"><br>
            </div>
        </div>
    </div>
    <div class ="container">
        <div class ="row">
            <div class ="col-3">
            </div>
            <div class ="col-1">
                <button class="btn btn-primary">
                    Suivant
                </button>
            </div>
        </div>
    </div>
</form>
@endif

<!--Si un utilisateur est connecté-->
@if (Auth::check())
        <form method="POST" action="route('register')">
            @csrf
            <div class = "container">
                <div class = "row">
                    <div class = "col-6">
                        <label for ="firstname" class="form-label">Firstname</label>
                        <input type="text" name="firstname"  class="form-control" placeholder = "{{Auth::user()->firstname}}"><br>
                        <label for ="address" class="form-label">Address</label>
                        <input type="text" name="address"  class="form-control" placeholder ="{{Auth::user()->address}}"><br>
                        <label for ="zipcode" class="form-label">Zipcode</label>
                        <input type="text" name="zipcode"  class="form-control" placeholder="{{Auth::user()->zipcode}}"><br>
                    </div>
                    <div class = "col-6">
                        <label for ="lastname" class="form-label">Lastname</label>
                        <input type="text" name="lastname" class="form-control" placeholder="{{Auth::user()->lastname}}"><br>
                        <label for ="city" class="form-label">City</label>
                        <input type="text" name="city"  class="form-control" placeholder="{{Auth::user()->city}}"><br>
                        <label for ="zipcode" class="form-label">Phone</label>
                        <input type="text" name="phone"  class="form-control" placeholder ="{{Auth::user()->phone}}"><br>
                    </div>
                </div>
            </div>
            <div class ="container">
                <div class ="row">
                    <div class ="col-3">
                    </div>
                    <div class ="col-1">
                        <button class="btn btn-primary" href = "{{ route('orderThree', [$space_id->id]) }}">
                            Suivant
                        </button>
                    </div>
                </div>
            </div>
        </form>
        @endif
        <br>
        <div class ="container">
            <div class ="row">
                <div class ="col-3">
                </div>
                <div class ="col-2">
                    <div class ="btn btn-primary">
                        Un problème ?
                    </div>
                </div>
            </div>
        </div>
    </main>
@stop
