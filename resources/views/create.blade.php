@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col offset-2 my-2">
            <h1>Pridaj nový inzerát</h1>
        </div>
        <form action="/a" enctype="multipart/form-data" method="post">
            @csrf
            <div class="row my-3">
                <label for="image" class="col-md-4 col-form-label text-md-end col-lg-4 col-xl-3 col-xxl-3">{{ __('Fotka') }}</label>
                <div class="col-md-6">
                    <input id="image" type="file" class="form-control-file @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}">

                    @error('image')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>
            </div>

            <div class="row my-3">
                <label for="title" class="col-md-4 col-form-label text-md-end col-lg-4 col-xl-3 col-xxl-3">{{ __('Názov') }}</label>
                <div class="col-md-6">
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" autocomplete="title">

                    @error('title')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>
            </div>

            <div class="row my-3">
                <label for="place" class="col-md-4 col-form-label text-md-end col-lg-4 col-xl-3 col-xxl-3">{{ __('Miesto') }}</label>
                <div class="col-md-6">
                    <input id="place" type="text" class="form-control @error('place') is-invalid @enderror" name="place" value="{{ old('place') }}" autocomplete="place">

                    @error('place')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>
            </div>

            <div class="row my-3">
                <label for="price" class="col-md-4 col-form-label text-md-end col-lg-4 col-xl-3 col-xxl-3">{{ __('Cena') }}</label>
                <div class="col-md-6">
                    <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" autocomplete="price">

                    @error('price')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>
            </div>

            <div class="row my-3">
                <label for="short_desc" class="col-md-4 col-form-label text-md-end col-lg-4 col-xl-3 col-xxl-3">{{ __('Krátky popis') }}</label>
                <div class="col-md-6">
                    <input id="short_desc" type="text" class="form-control @error('short_desc') is-invalid @enderror" name="short_desc" value="{{ old('short_desc') }}" autocomplete="short_desc">

                    @error('short_desc')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>
            </div>

            <div class="row my-3">
                <div class="col-1 offset-md-8">
                    <button class="btn btn-primary" type="submit">Pridaj</button>
                </div>
            </div>
        </form>
    </div>

@endsection
