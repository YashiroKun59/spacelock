@extends('layouts.default')
@section('title') Espace : {{ $space->nickname }}  @endsection
@section('description') Taper ici la description @endsection
@section('keywords') Taper ici les mots-clés @endsection
@section('canonical'){{ URL::current() }}@endsection
@section('content')
<?php  $fmt = numfmt_create( 'fr_BE', NumberFormatter::CURRENCY ) ?>
    <main class="main">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('catalog.index',$site->id)}}">{{ $site->name }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $space->nickname }}</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-6 text-center"><img src="{{ $space->picture}}" class="img-fluid rounded-top" alt=""></div>
            <div class="col-6">
                <h2 class="text-center" >{{ $site->name}} - {{ $space->nickname }}</h2>
                <div class="row">
                    <div class="col text-center">
                        1 mois <br>
                        {{ $fmt->formatCurrency($space->amount, 'EUR') }} HTVA <br>
                        {{ $fmt->formatCurrency(($space->amount + ( $space->amount * $space->tax / 100 )), 'EUR') }} TTC
                    </div>
                    <div class="col text-center">
                        3 Mois <br>
                        {{ $fmt->formatCurrency(floatval($space->amount) * 0.90, 'EUR') }} HTVA <br>
                        {{ $fmt->formatCurrency(($space->amount * 0.90 + ( $space->amount * 0.90 * $space->tax / 100 )), 'EUR') }} TTC
                    </div>
                    <div class="col text-center">
                        12 Mois <br>
                        {{ $fmt->formatCurrency(floatval($space->amount) * 0.80, 'EUR') }} HTVA <br>
                        {{ $fmt->formatCurrency(($space->amount * 0.80 + ( $space->amount * 0.80 * $space->tax / 100 )), 'EUR') }} TTC
                    </div>
                </div>
                <br>
                <p class="text-center">
                    Longueur: {{ number_format($space->length / 100, 2, '.', ',') }} m <br>
                    Largeur: {{ number_format($space->width / 100, 2, '.', ',') }} m <br>
                    Hauteur: {{ number_format($space->height / 100, 2, '.', ',') }} m <br> &nbsp; <br>
                    Volume: {{ number_format($space->length / 100 * $space->width / 100 * $space->height / 100, 2, '.', ',') }} m&sup3; <br>
                    Surface: {{ number_format($space->length / 100 * $space->width / 100, 2, '.', ',') }} m&sup2; <br>
                </p>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-6 text-center">
                <div class="row">
                    <div class="col">
                        <form class="" action="{{route("orderTwo")}}" method="post">
                            @csrf
                            <input type="hidden" name="spaceId" value="{{$space->id}}">
                            <button class="btn btn-secondary">Louer</button>
                        </form>
                    </div>
                    <div class="col">
                        <form class="" action="{{route('myspace.contact')}}" method="post">
                            @csrf
                            <input type="hidden" name="spaceId" value="{{$space->id}}">
                            <button class="btn btn-primary">Contactez-nous</button>
                        </form>
                    </div>
                </div>
                <br>
                <p>
                    Plus d'info <a href="tel:{{ $site->phone }}">{{ $site->phone }}</a><br>
                    <a href="mailto:{{ $site->email }}">{{ $site->email }}</a>
                </p>
            </div>
            <div class="col-6  text-center">
                <h3>Option</h3>
                <div class="table-responsive">
                    <table class="table table-primary">
                        <tbody>
                            @foreach ($options as $option)
                            <tr>
                                <td>{{ $option->name }}</td>
                                <td>
                                    <?php $exists = false ?>
                                    @foreach ( $optionsExists as $oe )
                                        @if ($oe->option_id === $option->id)
                                            <?php $exists = true ?>
                                        @endif
                                    @endforeach
                                    @if ($exists)
                                        <span class="badge text-bg-success"><i class="bi bi-hand-thumbs-up-fill"></i></span>
                                    @else
                                        <span class="badge text-bg-danger"><i class="bi bi-hand-thumbs-down-fill"></i></i></span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
   </main>
@stop
