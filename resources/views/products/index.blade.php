<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> <!-- Подключите свой CSS файл -->
</head>
<body>
@include('layouts.app')

<div class="container">
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card single-product"> <!-- Добавили класс single-product -->
                    @if ($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="card-img-top" />
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                        <p class="product-price"><strong>Price: </strong>${{ $product->price }}</p>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">View Product</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

</body>
</html>
