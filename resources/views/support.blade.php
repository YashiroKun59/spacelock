@extends('layouts.default')
@section('title') SAV @endsection
@section('description') SAV @endsection
@section('keywords') sav @endsection
@section('canonical'){{ URL::current() }}@endsection
@section('content')

    <main>
        @if(!empty($errorMsg))
            <div class="alert alert-danger"> {{ $errorMsg }}</div>
        @else
            <div class="container">
                <div class="container">
                    <h2>SAV</h2>
                    <p>
                        Description
                    </p>
                    <h2 class="mt-4">FAQ</h2>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <h3>Question 1</h3>
                            Reponse 1
                        </li>
                        <li class="list-group-item">
                            <h3>Question 2</h3>
                            Reponse 2
                        </li>
                    </ul>
                    <form class="mt-4" action="/support" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="question">Questions personalisé</label>
                            <textarea class="form-control mb-4" type="text" placeholder="Entrez votre question ici :" name="question" id="question" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <button class="form-control" id="submitchanges">Envoyer</button>
                        </div>
                        <input type="hidden" name="rentId" value="{{request('rentId')}}">
                        @if(!empty($successMsg))
                        <div class="alert alert-success"> {{ $successMsg }}</div>
                        @endif
                    </form>
                </div>
            </div>
        @endif
    </main>
@stop
