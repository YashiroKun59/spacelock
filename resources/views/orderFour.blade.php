@extends('layouts.default')
@section('title') Taper ici le title de la page @endsection
@section('description') Taper ici la description @endsection
@section('keywords') Taper ici les mots-clés @endsection
@section('canonical'){{ URL::current() }}@endsection
@section('content')

<main id="main">
    <div class="container-fluid" style="width: 70%">
        <div class="progress" role="progressbar" aria-label="Animated striped" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 80%"></div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 border">
                <div class="card-title">
                    <h2 class="text-center text-decoration-underline">Votre contrat</h2>
                    <div class="card-body">
                        <p class="card-text text-start">
                            <h4>Vos informations :</h4>
                            <p>Non : {{$recup->lastname}} </p>
                            <p>Prenom : {{$recup->firstname}}</p>
                            <h4>Votre adresse :</h4>
                            <p>{{$recup->address}}, {{$recup->zipcode}}, {{$recup->city}}</p>
                            <h4>Date de début :</h4>
                            <p>{{$recup->start_at}}</p>
                            <h4>Date de fin :</h4>
                            <p>{{$recup->end_at}}</p>
                            <h4>Espace :</h4>
                            <p>{{$recup->nickname}}</p>
                            <h4>Prix :</h4>
                            <p>{{$recup->amount}} €</p>
                            <h4>Types d'espace :</h4>
                            <p>{{$recup->name}}</p>
                            <h4>Nom du site du container :</h4>
                            <p>{{$recup->name}}</p>
                            <p>{{$recup->address}}</p>
                            <p>{{$recup->zipcode}}</p>
                            <h4>Signer ici : </h4>
                            <h6>Merci de votre confiance</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 text-center" >
                <h3 style="margin-bottom: 5%">Possibilité pour signer</h3>
                <button class="btn btn-primary">E-Sign</button>
                <br>
                <br>
                <br>
                <form accept-charset="UTF-8" action="{{route('orderFour.file')}}" method="POST" enctype="multipart/form-data" target="_blank">
                @csrf
                <div class="form-group mt-3">
                    <label class="mr-2">Upload votre contrat signé:</label>
                    <br>
                    <input type="file" name="file" class="btn btn-primary text-center">
                </div>
                <hr>
                <button class="btn btn-primary">Envoyer</button>
                </form>
            </div>
        </div>
    </div>
<br>
<div class="container">
    <div class="row">
        <div class="col-sm-6 text-center">
            <a href="{{route('contratpdf')}}" class="btn btn-primary text-center">Télécharger pour signer</a>
            <br>
            <br>
            <a href="commander5.blade.php" class="btn btn-primary text-center">Suivant</a>
            <br><br>
            <a href="" class="btn btn-primary text-center">Problème?</a>
        </div>

    </div>

</div>

</main>
@stop










<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>


</body>
</html>
