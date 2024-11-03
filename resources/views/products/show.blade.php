<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid rounded" style="max-height: 400px; object-fit: contain;">
            @endif
        </div>
        <div class="col-md-6">
            <h1>{{ $product->name }}</h1>
            <p>{{ $product->description }}</p>
            <h3>${{ number_format($product->price, 2) }}</h3>
            <form action="{{ route('cart.add') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="hidden" name="product_name" value="{{ $product->name }}">
                <input type="hidden" name="product_price" value="{{ $product->price }}">
                <button type="submit" class="btn btn-primary btn-lg mt-3">Add to Cart</button>
            </form>
        </div>
    </div>

    <div class="mt-5">
        <h2>Other Products</h2>
        <div class="row">
            @foreach($otherProducts as $otherProduct)
                <div class="col-md-3">
                    <div class="card mb-4">
                        @if ($otherProduct->image)
                            <img src="{{ asset('storage/' . $otherProduct->image) }}" alt="{{ $otherProduct->name }}" class="card-img-top" style="height: 200px; object-fit: contain;">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $otherProduct->name }}</h5>
                            <p class="card-text">${{ number_format($otherProduct->price, 2) }}</p>
                            <a href="{{ route('products.show', $otherProduct->id) }}" class="btn btn-outline-primary btn-sm">View Product</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

</body>
</html>
