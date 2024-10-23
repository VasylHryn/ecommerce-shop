<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
@include('layouts.app')

<div class="container">
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100 d-flex flex-column product-card">
                    <a href="{{ route('products.show', $product->id) }}" class="card-link">
                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="card-img-top img-fluid">
                        @endif
                    </a>
                    <div class="card-body d-flex flex-column">
                        <h4 class="card-title">{{ $product->name }}</h4>
                        <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                        <p class="product-price"><strong>Price: </strong>${{ $product->price }}</p>
                        <div class="mt-auto">
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary mb-2">View Product</a>
                            <form action="{{ route('cart.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="product_name" value="{{ $product->name }}">
                                <input type="hidden" name="product_price" value="{{ $product->price }}">
                                <button type="submit" class="btn btn-success">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
   <div class="row">
    <div class="col-md-12">
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                {{ $products->links('pagination::bootstrap-4') }}
            </ul>
        </nav>
    </div>
</div>
</div>



</body>
</html>
