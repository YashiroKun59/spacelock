@extends('layouts.default')
@section('title') Catalogue des espaces @endsection
@section('description')Catalogue des espaces @endsection
@section('keywords')coucou location container  @endsection
@section('canonical'){{ URL::current() }}@endsection
@section('content')
   <main id="main">
    <div class="fluid">
        <select class="form-select" aria-label="Default select example" id="siteSelect">
            @foreach ( $allsite as $site )
            <option value="{{$site->id}}" @if ($site->id==$currentSite)
                selected
            @else

            @endif>{{$site->city}} </option>

            @endforeach
        </select>
        <a href="/catalog" class="btn btn-primary" id="siteButton">Changer de Site</a>
    </div>

    <div class="card-group ">
        @foreach ($spacesOnSite as &$space)
        <div class="col-md-4 ">
            <div class="card">
                <img src="{{ $space->picture }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{ $space->nickname }}</h5>
                  <p class="card-text">{{ $space->description }}</p>
                  <p class="card-text"><small class="text-muted">{{ $space->price->amount }} €</small></p>
                  <div class="btn-group" role="group" aria-label="Basic example">
                      <a href="#" class="btn btn-primary">Info</a>
                      <a href="#" class="btn btn-secondary">Louer</a>
                  </div>
                </div>
              </div>
        </div>

        @endforeach
      </div>
   </main>


@stop
@section('javascript')
<script src="{{ asset('/js/site.js') }}"></script>
@stop
