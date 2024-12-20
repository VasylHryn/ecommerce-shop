@extends('layouts.app')

@section('content')
    <h1>Search Results for "{{ $query }}"</h1>

    @if($products->isEmpty())
        <p>No products found.</p>
    @else
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4">
                    <div class="card mb-4">
                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                 class="card-img-top img-fluid">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                            <div class="buttons">
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">View
                                    Product</a>
                                <form action="{{ route('cart.add') }}" method="POST" class="ml-2">
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
    @endif
@endsection
