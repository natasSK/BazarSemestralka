@php use App\Models\FavoriteProduct; @endphp
@extends('layouts.app')

@section('content')
    <div class="container mt-3 col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="row advertRow">
            <div class="col-lg-5">
                <div class="container">
                    <div class="d-flex">
                        <div class="position-relative">
                            @if ($advert->photo)
                                <img class="image-fluid adMainImage" src="{{ asset('storage/' . $advert->photo) }}" alt="Fotka">
                            @else
                                <img class="image-fluid adMainImage" src="https://www.pacificfoodmachinery.com.au/media/catalog/product/placeholder/default/no-product-image-400x400.png" alt="Fotka">
                            @endif
                            @auth
                            <a href="#" class="toggle-favorite position-absolute top-0 adToFavoritesLink"
                               data-advert-id="{{ $advert->id }}"
                               data-csrf-token="{{ csrf_token() }}"
                               data-is-favorite="{{ FavoriteProduct::isFavorite(auth()->id(), $advert->id) ? 'true' : 'false' }}">
                                @if (FavoriteProduct::isFavorite(auth()->id(), $advert->id))
                                    <ion-icon name="heart-dislike-circle-outline"></ion-icon>
                                @else
                                    <ion-icon name="heart-circle-outline"></ion-icon>
                                @endif
                            </a>
                                @endauth
                            @can('update', $advert)
                                <div class="position-absolute top-0 start-0">
                                    <a href="/adverts/{{ $advert->id }}/edit" class="btn btn-warning btn-lg mt-1 mx-1">Uprav</a>
                                    <form method="POST" action="/adverts/{{ $advert->id }}/delete">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-lg mt-1 mx-1">Zmaž</button>
                                    </form>
                                </div>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg textInfo mx-3">
                <div class="row my-2 mx-1 text-truncate fw-bold fs-1 adTitle">
                    <p>{{ $advert->title }}</p>
                </div>
                <div class="row">
                    <div class="col-7 py-1">
                        <a class="linkProfile" href="{{ route('profile.show', ['user' => $advert->user_id]) }}">
                            <div class="row mx-2">
                                <div class="d-inline firstHalf">
                                    @if ($user->photo)
                                        <img src="{{ asset('storage/' . $user->photo) }}" alt="Užívateľská fotka" class="img-fluid rounded-5">
                                    @else
                                        <img src="https://holmesbuilders.com/wp-content/uploads/2016/12/male-profile-image-placeholder.png" class="img-fluid rounded-5" alt="Profilový obrázok">
                                    @endif
                                </div>
                                <div class="d-inline secondHalf">
                                    <h5>{{ $user->username }}</h5>
                                    <p>{{ $user->email }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <div class="row mt-3 mx-1 fw-bold adPlaceMain">
                            <p class="my-1">{{ $advert->place }}</p>
                        </div>
                        <div class="row mt-1 mx-1 fw-bold adPriceMain">
                            <p class="my-1">{{ $advert->price }}€</p>
                        </div>
                    </div>
                </div>
                <div class="row my-2 mx-1">
                    Stav: {{ $advert->type }}, Kategória: {{ $advert->category }}, z dňa {{ $advert->created_at }} (č. {{ $advert->id }})
                </div>
                <div class="row my-2 mx-1 overflow-scroll overflow-x-hidden overflow-y-auto border-light-subtle adDescription">
                    {{ $advert->description }}
                </div>
            </div>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
@endsection
