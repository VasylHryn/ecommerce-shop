<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
@include('layouts.app')

<div class="container my-5">
    <div class="row g-4">
        @foreach($products as $product)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 product-card">
                    <a href="{{ route('products.show', $product->id) }}" class="card-link">
                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                 class="card-img-top img-fluid">
                        @else
                            <img src="https://via.placeholder.com/300x200" alt="No image"
                                 class="card-img-top img-fluid">
                        @endif
                    </a>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text text-muted">{{ Str::limit($product->description, 100) }}</p>
                        <p class="product-price"><strong>Price: </strong>${{ $product->price }}</p>
                        <div class="mt-auto">
                            <a href="{{ route('products.show', $product->id) }}"
                               class="btn btn-outline-primary w-100 mb-2">View Product</a>
                            <form action="{{ route('cart.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="product_name" value="{{ $product->name }}">
                                <input type="hidden" name="product_price" value="{{ $product->price }}">
                                <button type="submit" class="btn btn-success w-100">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row mt-4">
        <div class="col-12">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    {{ $products->links('pagination::bootstrap-4') }}
                </ul>
            </nav>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p>© {{ date('Y') }} E-Store. All rights reserved.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
