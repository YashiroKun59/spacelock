<!DOCTYPE html>
<html>
<head>

</head>
<body>
    <div class="row">
        <div class="col-sm-6 border text-center">
          <div class="card-title">
            <h2 class="text-center text-decoration-underline">Votre contrat</h2>
            <div class="card-body">
              <p class="card-text">
                <h4>Vos informations</h4>
                <p>Non : {{$recup->lastname}} </p>
                <p>Prenom : {{$recup->firstname}}</p>
                <h4>Votre adresse</h4>
                <p>{{$recup->address}}, {{$recup->zipcode}}, {{$recup->city}}</p>
                <h4>Date de début</h4>
                <p>{{$recup->start_at}}</p>
                <h4>Espace</h4>
                <p>{{$recup->nickname}}</p>
                <h4>Prix</h4>
                <p>{{$recup->amount}} €</p>
                <h4>Types d'espace</h4>
                <p>{{$recup->name}}</p>
                <h4>Nom du site du container</h4>
                <p>{{$recup->name}}</p>
                <p>{{$recup->address}}</p>
                <p>{{$recup->zipcode}}</p>
                <p>Signer ici : </p>
                <h6>Merci de votre confiance</h6>


            </div>
          </div>
        </div>

</body>
</html>
