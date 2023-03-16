<!DOCTYPE html>
<html>
<head>
    <title>Laravel Le Bon Coin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" />
</head>
<body>
    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-10 offset-1 mt-5">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h3 class="text-white">Laravel Le Bon Coin</h3>
                    </div>
                    <div class="card-body">
                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{Session::get('success')}}
                            </div>
                        @endif
                        <div class="form-group text-center">
                            <button class="btn btn-success btn-submit" type="submit" onclick="location.href='{{ url('annonces') }}'">Create a new announce</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @foreach ($annonces as $annonce)
        <div class="list-group">
            <a href="{{route('annonce.details', $annonce->id) }}" class="list-group-item list-group-item-action flex-column align-items-start">
              <div class="d-flex w-100 justify-content-between">
                <h4 class="mb-1">{{ $annonce->title }}</h4>
              </div>
              <ul>
                <li>Name: {{ $annonce->name }}</li>
                <li>Email: {{ $annonce->email }}</li>
                <li>Location: {{ $annonce->location }}</li>
                <li>Price: {{ $annonce->price }}€</li>
            </ul>
              <p class="mb-1">{{ $annonce->description }}</p>
            </a>
        </div> 
        @endforeach
    </div>
</body>
</html>