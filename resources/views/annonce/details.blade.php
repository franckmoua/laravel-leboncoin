<!DOCTYPE html>
<html>
<head>
    <title>Laravel Le bon coin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" />
</head>
<body>
    <a type="button" href="{{route('annonce.front')}}" >
    back to homepage
</a>

@if (session('message'))
    <p>{{ session('message') }}</p>
@endif
    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-10 offset-1 mt-5">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h3 class="text-white">{{ $annonces->title }}</h3>
                    </div>
                    <ul>
                        <li>Name: {{ $annonces->name }}</li>
                        <li>Email: {{ $annonces->email }}</li>
                        <li>Location: {{ $annonces->location }}</li>
                        <li>Price: {{ $annonces->price }}€</li>
                    </ul>
                      <p>{{ $annonces->description }}</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>