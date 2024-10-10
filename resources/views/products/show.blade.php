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
         @if ($product->image)
    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="width: 100px; height: auto;" />
@endif
<div class="row">
    <div class="col-md-6">
        <img src="{{ $product->image }}" class="img-fluid" alt="{{ $product->name }}">
    </div>
    <div class="col-md-6">
        <h1>{{ $product->name }}</h1>
        <p>{{ $product->description }}</p>
        <h3>${{ $product->price }}</h3>
        <a href="#" class="btn btn-success">Add to Cart</a>
    </div>
</div>
@endsection


</body>
</html>
