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
                            <h3>Qu'est ce que SpaceLock ?</h3>
                            <p>SpaceLock est un site web de locations d'espaces libres pour stocker toutes sortes d'objets dont on ne trouve la place dans son quotidien.</p>
                        </li>
                        <li class="list-group-item">
                            <h3>Combien d'espaces peut-on louer sur le site ?</h3>
                            <p>Autant que vous le voulez ! Vous devez seléctionnez un site puis un ou des espaces mis à votre disposition, s'ils ne sont pas encore pris.</p>
                        </li>
                        <li class="list-group-item">
                            <h3>Que se passe t-il si le paiement n'est pas validé ?</h3>
                            <p>Un message d'erreur s'affichera vous indiquant le non paiement de l'espace en question. Un message d'erreur s'affichera de façon permanente sur votre espace personnel MySpaceLock à la rubrique SAV.</p>
                        </li>
                        <li class="list-group-item">
                            <h3>Si je ne trouve pas de réponse à ma question dans cette FAQ, que dois-je faire ?</h3>
                            <p>Vous pouvez toujours nous envoyer votre question sur la page Contact, où à la rubrique "SAV>Question personnaliser" afin que nous puissions la traiter dans les plus brefs délais.</p>
                        </li>
                    </ul>
                    <form class="mt-4" action="/support" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="question">Questions personnaliser</label>
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
