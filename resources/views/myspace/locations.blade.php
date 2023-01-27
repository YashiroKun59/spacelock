@extends('layouts.default')
@section('title') Mes locations @endsection
@section('description') Retrouvez ici vos locations @endsection
@section('keywords') location rental spacelock @endsection
@section('canonical'){{ URL::current() }}@endsection
@section('content')

    <main>
        <div class="container">
            <h1>Locations de {{Auth::user()->firstname}} {{Auth::user()->lastname}}</h1>
            <table class="table">
                <th>Début</th>
                <th>Fin</th>
                <th>period</th>
                <th>contrat</th>
                <th>space</th>
                @if (count($rentals) <= 0)
                <tr>
                    <td class="text-center" colspan="6">
                        <p>
                            Vous n'avez pas de location. Louez un Space grâce à <a href="/"> SpaceLock!</a>
                        </p>
                    </td>
                </tr>
                @else

                @foreach ($rentals as $rental)
                <tr>
                    <td>{{$rental->start_at}}</td>
                    <td>{{$rental->end_at}}</td>
                    <td>{{$rental->bill_period}}</td>
                    <td><a href="{{$rental->contrat_url}}">Contrat</a></td>
                    <td>{{$rental->space_id}}</td>
                </tr>
                @endforeach
                @endif

            </table>
        </div>
    </main>

@stop
