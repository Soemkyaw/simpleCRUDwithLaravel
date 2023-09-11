@extends('main')

@section('content')
    <div class="container shadow bg-primary-subtle rounded">
        <form action="{{ route('create#page') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <h5 class=" text-center text-primary fw-bold text-uppercase my-3">Import Products</h5>
                <div class=" col-7 my-2 ">
                    <div class="my-2">
                        <label for="" class=" form-label text-primary">Title</label>
                        <input type="text" name="productName" class=" form-control @error('productName') is-invalid @enderror" value="{{ old('productName') }}">
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            @error('productName')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="my-2">
                        <label for="" class=" form-label text-primary">Description</label>
                        <textarea name="productDescription" cols="30" rows="10" class=" form-control @error('productDescription') is-invalid @enderror">{{ old('productDescription')}}</textarea>
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            @error('productDescription')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class=" col-3 my-2 ">
                    <div class="my-2">
                        <label for="" class=" form-label text-primary">Image</label>
                        <input type="file" name="imageFile" class=" form-control">
                        {{-- <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            @error('productAddress')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div> --}}
                    </div>
                    <div class="my-2">
                        <label for="" class=" form-label text-primary">Address</label>
                        <input type="text" name="productAddress" class=" form-control @error('productAddress') is-invalid @enderror" value="{{ old('productAddress') }}">
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            @error('productAddress')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="my-2">
                        <label for="" class=" form-label text-primary">Price</label>
                        <input type="number" name="productPrice" class=" form-control @error('productPrice') is-invalid @enderror" value="{{ old('productPrice') }}">
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            @error('productPrice')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="my-2">
                        <label for="" class=" form-label text-primary">Rating</label>
                        <input type="number" name="productRating" min="0" max="5" class=" form-control @error('productRating') is-invalid @enderror" value="{{ old('productRating') }}">
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            @error('productRating')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary float-end my-2" value="Create">
                </div>
                <div class=" col-6 offset-3 text-center">
                    @if (session('createStatus'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('createStatus') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session('deleteStatus'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session('deleteStatus') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session('updateStatus'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>{{ session('updateStatus') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>
            </div>
        </form>

        <hr>

        <div class="row">
            <div class="col-3 offset-1">Total Products-{{ $products->total() }}</div>
            <div class="col-3 offset-3">
                <form action="{{ route('home') }}" method="GET">
                    <div class="input-group mb-3 ">
                        <input type="text" class="form-control" name="searchItem">
                        <input type="submit" value="Search" class="btn btn-outline-primary">
                    </div>
                </form>
            </div>
            @foreach ($products as $item)
                <div class="col-6 offset-3 shadow-sm p-3 my-2">
                    <h5 class="text-center">{{ $item->title }}</h5>
                    <p class="text-muted">{{ Str::words($item->description,'25','...') }}</p>
                    <div class="text-center my-2">
                        <span class="me-2">{{ $item->address }} <i class="fa-solid fa-location-dot text-info"></i></span> |
                        <span class="mx-2">{{ $item->price }} <i class="fa-solid fa-money-bill-1-wave text-success"></i></span> |
                        <span class="ms-2">{{ $item->rating }} <i class="fa-solid fa-star text-warning"></i></span>
                    </div>
                    <div class="text-center my-3">
                        <a href="{{ route('delete#page',[$item->id]) }}" class="btn btn-sm btn-danger">Delete</a>
                        <a href="{{ route('show#page',[$item->id]) }}" class="btn btn-sm btn-primary">See More ></a>
                    </div>
                </div>
            @endforeach
            {{ $products->appends(request()->query())->links() }}
        </div>
    </div>
@endsection
