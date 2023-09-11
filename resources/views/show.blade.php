@extends('main')

@section('content')

    <div class="container mt-5 bg-primary-subtle py-5 rounded">
        <div class="row">
            <a href="{{ route('home') }}" class=" text-decoration-none text-black ms-5"><i class="fa-solid fa-arrow-left"></i> Back</a>
            <div class="col-6 offset-3 mt-5">
                <h5 class="text-center">{{ $product->title }}</h5>
                <p class="text-muted">{{ $product->description }}</p>
                {{-- <p class="text-muted">{{ $product->image }}</p> --}}
                <img src="{{ asset('storage/'.$product->image) }}" class=" img-thumbnail">
                <div class="text-center my-2">
                    <span class="me-2">{{ $product->address }} <i class="fa-solid fa-location-dot text-info"></i></span> |
                    <span class="mx-2">{{ $product->price }} <i class="fa-solid fa-money-bill-1-wave text-success"></i></span> |
                    <span class="ms-2">{{ $product->rating }} <i class="fa-solid fa-star text-warning"></i></span>
                </div>
            </div>
            <div class="mt-5">
                <a href="{{ route('edit#page',[$product->id]) }}" class="btn btn-sm btn-danger float-end me-5">Edit</a>
            </div>
        </div>
    </div>

@endsection
