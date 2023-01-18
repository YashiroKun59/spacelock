{{-- composent nav --}}
{{-- composent head --}}
<head>
    <title>meslocations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>

<body>

    <main>
        <div class="container">
            <h1>Locations de {{$customerfirstname}} {{$customerlastname}}</h1>
            <table class="table">
                <th>Début</th>
                <th>Fin</th>
                <th>period</th>
                <th>contrat</th>
                <th>space</th>
                @foreach ($rentals as $rental)
                    <tr>
                        <td>{{$rental->start_at}}</td>
                        <td>{{$rental->end_at}}</td>
                        <td>{{$rental->bill_period}}</td>
                        <td><a href="{{$rental->contrat_url}}">Contrat</a></td>
                        <td>{{$rental->space_id}}</td>
                    </tr>
                @endforeach

            </table>
        </div>
    </main>

</body>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>

{{-- composent footer --}}
