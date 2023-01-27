@extends('layouts.default')
@section('title') Home @endsection
@section('description') Site de location d'espaces @endsection
@section('keywords') location, contenaire @endsection
@section('canonical'){{ URL::current() }}@endsection
@section('content')

   <main id="main">
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <svg class="bd-placeholder-img" width="100%" height="480px" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>

            <div class="container">
              <div class="carousel-caption text-start">
                <h1>Example headline.</h1>
                <p>Some representative placeholder content for the first slide of the carousel.</p>
                <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <svg class="bd-placeholder-img" width="100%" height="480px" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>

            <div class="container">
              <div class="carousel-caption">
                <h1>Another example headline.</h1>
                <p>Some representative placeholder content for the second slide of the carousel.</p>
                <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <svg class="bd-placeholder-img" width="100%" height="480px" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>

            <div class="container">
              <div class="carousel-caption text-end">
                <h1>One more for good measure.</h1>
                <p>Some representative placeholder content for the third slide of this carousel.</p>
                <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
              </div>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    <br>
    <div id="map"></div>
    <br>
    <div class="card-group">
        <?php foreach ($spaces as &$space) { ?>
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
        <?php } ?>
      </div>

   </main>
@stop

@section('javascript')
    <script src="{{asset('template/leaflet/js/leaflet.js')}}"></script>
    <script>
        var osmLayer = L.tileLayer('http://a.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
            attribution: '&copy SpaceLock',
            maxZoom: 18
        });
        var map = new L.Map('map', {
            center: new L.LatLng(50.805935, 4.4659422),
            zoom: 8,
            layers: [osmLayer]
        });
        var markers = [];
        $.getJSON({
            url: '{{route('sites.json')}}'
        }).done(function (site) {
            var bounds = [];
            for ( var i=0; i < site.length; ++i ) {
                thisMarker = L.marker( [site[i].lat, site[i].lon]).addTo( map ).bindPopup("<h3>"+site[i].adress+"</h3><p>"+site[i].description+"</p>"+'<img src="'+site[i].picture+'" class="img-thumbnail" alt="...">');
                bounds.push([site[i].lat,site[i].lon]);
            }
            map.fitBounds(bounds,{padding: [20,20]});
        }).fail(function (xhr, status, error) {
            alert("There is a problem with your route to your json data: " + status + " " + error + " " + xhr.status + " " + xhr.statusText)
        });
    </script>
@stop
