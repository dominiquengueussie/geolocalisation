<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <script src="{{ asset('font-awesome/kit.fontawesome.js') }}" crossorigin="anonymous"></script>
 
    <title>Hello, world!</title>
</head>

<body onload="getLocation();">

    <div class="container mt-5">
        @if (Session::get('fail'))
            <p class="alert alert-danger col-md-8 mt-2 container">{{ session::get('fail') }}</p>
        @endif
        @if (Session::get('success'))
            <p class="alert alert-info col-md-8 mt-2 container">{{ session::get('success') }}</p>
        @endif
        <form class="myForm" method="post" action="{{ route('store') }}">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nom</label>
                <input name="nom" type="text" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Email</label>
                <input name="email" type="email" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
{{--                 <label for="exampleInputPassword1" class="form-label">Latitude</label>
 --}}                <input value="" name="latitude" hidden type="text"  class="form-control"
                    id="exampleInputPassword1">
            </div>
            <div class="mb-3">
{{--                 <label for="exampleInputPassword1" class="form-label">Longitude</label>
 --}}                <input value="" name="longitude" hidden type="text"  class="form-control"
                    id="exampleInputPassword1">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div class="container">
        <table class="table text-center">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Localisation</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Geolocal as $geolocal)
                <tr>
                    <td scope="row">{{ $geolocal->id }}</td>
                    <td>{{ $geolocal->nom }}</td>
                    <td>{{ $geolocal->email }}</td>
                    <td><iframe src="https://www.google.com/maps?q= <?php echo $geolocal['longitude']; ?>,<?php echo $geolocal['longitude']; ?>&hl=es;z=14&output=embeb" frameborder="0"></iframe>
                    </td>
                    <td>
                        <a title="Localiser" href="{{ url('geolocal/' . $geolocal->id) }}">
                            <i class=" fs-4 fa-solid fa-location-dot text-danger"></i>
                    </td>
                </tr>   
                @endforeach
            </tbody>
        </table>
    </div>

    <script type="text/javascript">
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            }
        }

        function showPosition(position) {
            document.querySelector('.myForm input[name = "latitude"]').value = position.coords.latitude;
            document.querySelector('.myForm input[name = "longitude"]').value = position.coords.longitude;
        }

        function showError(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    alert("Veuillez activer votre GPS pour utiliser l'application");
                    location.reload();
                    break;
            }
        }
    </script>
</body>

</html>
