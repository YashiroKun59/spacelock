{{-- composent nav --}}
{{-- composent head --}}
<head>
    <title>mesinfos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>

<body>

    <main>
        <div class="container">
            {{-- breadcrumb --}}
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">SpaceLock</a></li>
                    <li class="breadcrumb-item"><a href="/myspace">My Space</a></li>
                    <li class="breadcrumb-item active" aria-current="/myspace/infos">infos</li>
                </ol>
            </nav>
            {{-- breadcrumb end --}}
            <div class="container">
                <h1>Bienvenue {{ $firstname }} - <a href="/myspace/{{$email}}/locations">Locations</a></h1>
                <p>Email : {{ $email }}</p>
                <p>Nom : {{ $firstname }}</p>
                <p>Prénom : {{ $lastname }}</p>
            </div>
            <hr>
            <div class="container">
                <h2 class="mb-4">Changement de mot de passe.</h2>
                <form class="" action="/updatecustomer" method="post">
                    @csrf
                    <input type="hidden" name="email" value={{$email}}>
                    <div class="mb-3">
                        <label class="form-label" for="oldpassword">Mot de passe actuel:</label>
                        <input class="form-control mb-4" type="password" placeholder="ancient mot de passe" name="oldpassword" id="oldpassword">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="newpassword">Nouveau mot de passe:</label>
                        <input class="form-control mb-4" type="password" placeholder="nouveau mot de passe" name="newpassword" id="newpassword">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="confirmpassword">Confirmer nouveau mot de passe:</label>
                        <input class="form-control mb-4" type="password" placeholder="nouveau mot de passe" name="confirmpassword" id="confirmpassword">
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            @if ($data_collection === 0)
                            <input class="form-check-input" checked='false' type="checkbox" name="datacollection" id="datacollection">
                            @else
                            <input class="form-check-input" checked='true' type="checkbox"name="datacollection" id="datacollection">
                            @endif
                          <label class="form-check-label" for="">Autoriser la collection de données <a href="#">?</a></label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input class="form-control" id="submitchanges" hidden="false" type="submit" value="Confirmer">
                    </div>
                </form>
            </div>
        </div>
    </main>

</body>


<script type="text/javascript">
var oldpass ="";
var newpass = "";
var confpass = "";
submit = document.getElementById("submitchanges");
document
    .getElementById("oldpassword")
    .addEventListener("change", checkoldpassword);
document
    .getElementById("newpassword")
    .addEventListener("change", checknewpassword);
document
    .getElementById("confirmpassword")
    .addEventListener("change", checknewconfirmpassword);
document
    .getElementById("datacollection")
    .addEventListener("change", checkdatacollection);
function checkdatacollection(e){
    if (oldpass === "")
    {

    }
}
function checkoldpassword(e) {
    oldpass = e.target.value;
    checkpass();
}
function checknewpassword(e) {
    newpass = e.target.value;
    checkpass();
}
function checknewconfirmpassword(e) {
    confpass = e.target.value;
    checkpass();
}
function checkpass() {
    if (oldpass === newpass || oldpass === confpass || newpass === confpass) {
        submit.hidden = false;
    }
     else {
        submit.hidden = true;
    }
}


</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>

{{-- composent footer --}}
