<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
@extends('layouts.app')

@section('content')
<div class="row">

    @foreach($products as $product)
    <div class="col-md-4">

        <div class="card mb-4">
            @if ($product->image)
    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="width: 100px; height: auto;" />
@endif

            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                <p class="card-text"><strong>Price: </strong>${{ $product->price }}</p>
                <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">View Product</a>

            </div>

        </div>

    </div>

    @endforeach

</div>
@endsection
</body>
</html>


