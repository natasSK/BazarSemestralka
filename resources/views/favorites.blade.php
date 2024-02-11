@php use App\Models\FavoriteProduct; @endphp
@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1><ion-icon style="color: red; font-size: 64px" name="heart"></ion-icon> Obľúbené produkty</h1>

        <div class="col-md-8 mt-5">
            <div class="container najnovsie">
                <div class="row">
                    @foreach ($adverts as $ad)
                        <div class="col-md-6 col-lg-4 col-sm-5 col-4">
                                <div class="tile">
                                    <div class="tileUp" style="background-image: url('{{ $ad->photo ? asset('storage/' . $ad->photo) : asset('https://www.pacificfoodmachinery.com.au/media/catalog/product/placeholder/default/no-product-image-400x400.png') }}');">
                                        <a href="#" class="toggle-favorite" style="text-align: right; display: block"
                                           data-advert-id="{{ $ad->id }}"
                                           data-csrf-token="{{ csrf_token() }}"
                                           data-is-favorite="{{ FavoriteProduct::isFavorite(auth()->id(), $ad->id) ? 'true' : 'false' }}">
                                            @if (FavoriteProduct::isFavorite(auth()->id(), $ad->id))
                                                <ion-icon style="color: red; font-size: 32px"
                                                          name="heart-dislike-circle-outline"></ion-icon>
                                            @else
                                                <ion-icon style="color: red; font-size: 32px"
                                                          name="heart-circle-outline"></ion-icon>
                                            @endif
                                        </a>
                                    </div>
                                    <div class="tileDown">
                                        <div class="text-wrap">
                                            <a href="/adverts/{{ $ad->id }}" style="text-decoration: none; color: black">
                                                <h5>{{ $ad->title }}</h5>
                                            </a>
                                        </div>
                                        <div class="text-start text-wrap" style="font-size: smaller">
                                            <p class="mb-3">{{ $ad->short_desc }}</p>
                                        </div>
                                        <div class="text-start" style="color:dodgerblue">
                                            <p class="mb-0">{{ $ad->place }}</p>
                                        </div>
                                        <div class="text-start" style="color:mediumseagreen">
                                            <p class="mb-0">{{ $ad->price }}€</p>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

