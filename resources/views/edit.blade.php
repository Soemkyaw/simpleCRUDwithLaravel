@extends('main')

@section('content')

    <div class="container mt-5 bg-primary-subtle py-5 rounded">
        <div class="row">
            <a href="{{ route('show#page',[$product->id]) }}" class=" text-decoration-none text-black ms-5"><i class="fa-solid fa-arrow-left"></i> Back</a>
            <div class="col-6 offset-3 mt-5">
                <form action="{{ route('update#page',[$product->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <h5 class=" text-center text-warning fw-bold text-uppercase my-3">Proiduct</h5>
                        <div class=" col-7 my-2 ">
                            <div class="my-2">
                                <label for="" class=" form-label text-warning">Title</label>
                                <input type="text" name="productName" class=" form-control @error('productName') is-invalid @enderror" value="{{ old('productName',$product->title) }}">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    @error('productName')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="my-2">
                                <label for="" class=" form-label text-warning">Description</label>
                                <textarea name="productDescription" cols="30" rows="10" class=" form-control @error('productDescription') is-invalid @enderror">{{ $product->description }}</textarea>
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    @error('productDescription')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class=" col-4 my-2 ">
                            <div class="my-2">
                                <label for="" class=" form-label text-warning">Image</label>
                                <img src="{{ asset('storage/'.$product->image) }}" class=" img-thumbnail">
                                <input type="file" name="imageFile" class=" form-control form-control-sm @error('imageFile') is-invalid @enderror">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    @error('productAddress')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-2">
                                <label for="" class=" form-label text-warning">Address</label>
                                <input type="text" name="productAddress" class=" form-control @error('productAddress') is-invalid @enderror" value="{{ $product->address }}">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    @error('productAddress')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-2">
                                <label for="" class=" form-label text-warning">Price</label>
                                <input type="number" name="productPrice" class=" form-control @error('productPrice') is-invalid @enderror" value="{{ $product->price }}">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    @error('productPrice')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-2">
                                <label for="" class=" form-label text-warning">Rating</label>
                                <input type="number" name="productRating" min="0" max="5" class=" form-control @error('productRating') is-invalid @enderror" value="{{ $product->rating }}">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    @error('productRating')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <input type="submit" class="btn btn-warning float-end my-2" value="Update">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
