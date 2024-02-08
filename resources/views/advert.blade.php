@php use App\Models\FavoriteProduct; @endphp
@extends('layouts.app')

@section('content')
    <div class="container mt-3 col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="row" style="height: 400px;">
            <div class="col-lg-5">
                <div class="container">
                    <div class="d-flex">
                        <div class="position-relative">
                            <img class="image-fluid" src="https://www.pacificfoodmachinery.com.au/media/catalog/product/placeholder/default/no-product-image-400x400.png" alt="Second slide" style="width: 400px; height: 400px">
                            @if (FavoriteProduct::isFavorite(auth()->id(), $advert->id))
                                <div class="position-absolute top-0" style="right: 0;">
                                    <a href="{{ route('favorites.delete', ['id' => $advert->id]) }}">
                                        <ion-icon style="color: red; font-size: 32px"
                                                  name="heart-dislike-circle-outline"></ion-icon>
                                    </a>
                                </div>
                            @else
                                <div class="position-absolute top-0" style="right: 0;">
                                    <a href="{{ route('favorites.add', ['id' => $advert->id]) }}">
                                        <ion-icon style="color: red; font-size: 32px"
                                                  name="heart-circle-outline"></ion-icon>
                                    </a>
                                </div>
                            @endif
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
                <div class="row my-2 mx-1 text-truncate fw-bold fs-1" style="height: 15%">
                    <p>{{ $advert->title }}</p>
                </div>

                <div class="row">
                    <div class="col-7 py-1">
                        <a href="{{ route('profile.show', ['user' => $advert->user_id]) }}" style="text-decoration: none; color: black">
                            <div class="row mx-2">
                                <div class="d-inline" style="width: 120px">
                                    <img src="https://holmesbuilders.com/wp-content/uploads/2016/12/male-profile-image-placeholder.png" class="img-fluid rounded-5" alt="Profilový obrázok" style="height: 100px; width: 120px">
                                </div>
                                <div class="d-inline" style="width: 50%; margin-top: 25px;">
                                    <h5>{{ $user->username }}</h5>
                                    <p>{{ $user->email }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <div class="row mt-3 mx-1 fw-bold" style="color: dodgerblue; font-size: large">
                            <p class="my-1" style="font-size: larger">{{ $advert->place }}</p>
                        </div>
                        <div class="row mt-1 mx-1 fw-bold" style="color:mediumseagreen; font-size: large">
                            <p class="my-1" style="font-size: larger">{{ $advert->price }}€</p>
                        </div>
                    </div>

                </div>
                <div class="row my-2 mx-1">
                    Stav: {{ $advert->type }}, Kategória: {{ $advert->category }}, z dňa {{ $advert->created_at }} (č. {{ $advert->id }})
                </div>

                <div class="row my-2 mx-1 overflow-scroll overflow-x-hidden overflow-y-auto border-light-subtle" style="height: 28%; padding: 10px; border: 1px solid">
                    {{ $advert->description }}
                </div>


            </div>


        </div>

    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

@endsection
