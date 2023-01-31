
@extends('layouts.default')
@section('title') SAV @endsection
@section('description') SAV @endsection
@section('keywords') sav @endsection
@section('canonical'){{ URL::current() }}@endsection
@section('content')

    <main>
        @if(!empty($successMsg))
        <div class="alert alert-success"> {{ $successMsg }}</div>
        @endif
        <ul class="list-group">
            @foreach ( $supports as $support )
            <li class="list-group-item">
                {{$support->user->email}} : {{$support->message}}{{$support->message}}
                <form action="/supportlistsubmit" method="post">
                @csrf
                <div class="mb-3">
                    <textarea class="form-control" type="text" placeholder="Entrez votre reponse ici :" name="reponse" id="reponse" required></textarea>
                    <button class="form-control" id="submitchanges">Repondre</button>
                </div>
                <input type="hidden" name="supportId" value="{{$support->id}}">
            </form>
            </li>
            @endforeach
        </ul>
    </main>

@stop