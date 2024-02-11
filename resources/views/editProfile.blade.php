@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col offset-2 my-4 ">
            <h1>Uprav profilové informácie</h1>
        </div>
        <form action="{{ route('update-profile', ['id' => $user->id]) }}" enctype="multipart/form-data" method="post">
            @csrf
            @method('PATCH')

            <div class="row my-3">
                <label for="image" class="col-md-4 col-form-label text-md-end col-lg-3">{{ __('Fotka') }}</label>
                <div class="col-md-6">
                    @if($user->photo)
                        <img src="{{ asset('storage/' . $user->photo) }}" alt="Current Photo" class="img-thumbnail mb-3 editPhoto">
                    @endif
                    <input id="image" type="file" class="form-control-file @error('photo') is-invalid @enderror" name="photo">
                    <div class="form-check my-3">
                        <input class="form-check-input" type="checkbox" id="delete_photo" name="delete_photo" value="1">
                        <label class="form-check-label" for="delete_photo">
                            Vymazať fotku
                        </label>
                    </div>
                    @error('photo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row my-3">
                <label for="name" class="col-md-4 col-form-label text-md-end col-lg-4 col-xl-3 col-xxl-3">{{ __('Meno') }}</label>
                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" autocomplete="name">

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row my-3">
                <label for="phone_number" class="col-md-4 col-form-label text-md-end col-lg-4 col-xl-3 col-xxl-3">{{ __('Telefónne číslo') }}</label>
                <div class="col-md-6">
                    <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ $user->phone_number }}" autocomplete="phone_number">

                    @error('phone_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row my-3">
                <label for="district" class="col-md-4 col-form-label text-md-end col-lg-4 col-xl-3 col-xxl-3">{{ __('Adresa') }}</label>
                <div class="col-md-6">
                    <input id="district" type="text" class="form-control @error('district') is-invalid @enderror" name="district" value="{{ $user->district }}" autocomplete="district">

                    @error('district')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row my-3">
                <div class="col-1 offset-md-8">
                    <button class="btn btn-primary" type="submit">Uprav</button>
                </div>
            </div>
        </form>
    </div>
@endsection

