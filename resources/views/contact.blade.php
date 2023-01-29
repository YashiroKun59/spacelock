@extends('layouts.default')
@section('title') Contacter-nous @endsection
@section('description') Contacter-nous @endsection
@section('keywords') contact @endsection
@section('canonical'){{ URL::current() }}@endsection
@section('content')

    <main>
        <div class="container">
            <div class="container">
                <h2 class="mb-4">Contacter-nous</h2>
                <form class="" action="/homecontact" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="email">Email address</label>
                        <input class="form-control mb-4" type="email" placeholder="name@example.com" name="email" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="nom">Nom</label>
                        <input class="form-control mb-4" type="text" placeholder="" name="nom" id="nom" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="prenom">Prénom</label>
                        <input class="form-control mb-4" type="text" placeholder="" name="prenom" id="prenom" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="question">Posez ici votre question</label>
                        <textarea class="form-control mb-4" type="text" placeholder="" name="question" id="question" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <button class="form-control" id="submitchanges">Submit</button>
                    </div>
                    @if(!empty($successMsg))
                    <div class="alert alert-success"> {{ $successMsg }}</div>
                    @endif
                </form>
            </div>
        </div>
    </main>
@stop
