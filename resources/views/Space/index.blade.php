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
                  <div class="row text-center">
                    <div class="col"><a href="{{url("/catalog/{$site->id}/{$space->id}")}}" class="btn btn-primary" type="button">Info</a></div>
                    <div class="col">
                        <form class="" action="{{route("orderTwo")}}" method="post">
                            @csrf
                            <input type="hidden" name="spaceId" value="{{$space->id}}">
                            <button class="btn btn-secondary">Louer</button>
                        </form>
                    </div>
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
