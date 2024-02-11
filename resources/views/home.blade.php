@php use App\Models\FavoriteProduct; @endphp
@extends('layouts.app')

@section('content')

    <div class="container-fluid px-5" id="pozadie-container">
        <div class="container px-5 hlObrDiv">
            <div class="search">
                <form method="GET" action="{{ route('advert.search', ['string' => '']) }}">
                    <input type="text" name="string" placeholder="Vyhľadávanie" class="vyhladavanie">
                    <button type="submit"><ion-icon name="search-outline"></ion-icon></button>
                </form>
            </div>
        </div>
    </div>

    <div class="container pt-1 px-4 kategorie">
        <div class="row my-3">
            <div class="col mx-2 KatColumn">

                <a id="K_oblecenie" href="{{ route('search') }}?category=Oblečenie" class="card text-center mb-3 kategoria">
                    <div class="card-body pt-2 pb-2 px-1">
                        <br><br>
                    </div>
                </a>

            </div>
            <div class="col mx-2">

                <a id="K_auta" href="{{ route('search') }}?category=Autá" class="card text-center mb-3 kategoria">
                    <div class="card-body pt-2 pb-2 px-1">
                        <br><br>
                    </div>
                </a>

            </div>
            <div class="col mx-2">

                <a id="K_dom" href="{{ route('search') }}?category=Reality" class="card text-center mb-3 kategoria">
                    <div class="card-body pt-2 pb-2 px-1">
                        <br><br>
                    </div>
                </a>

            </div>
            <div class="col mx-2">

                <a id="K_deti" href="{{ route('search') }}?category=Deti" class="card text-center mb-3 kategoria">
                    <div class="card-body pt-2 pb-2 px-1">
                        <br><br>
                    </div>
                </a>

            </div>
        </div>
        <div class="row my-3">
            <div class="col mx-2">

                <a id="K_motorka" href="{{ route('search') }}?category=Motorky" class="card text-center mb-3 kategoria">
                    <div class="card-body pt-2 pb-2 px-1">
                        <br><br>
                    </div>
                </a>

            </div>
            <div class="col mx-2">

                <a id="K_pohovka" href="{{ route('search') }}?category=Nábytok" class="card text-center mb-3 kategoria">
                    <div class="card-body pt-2 pb-2 px-1">
                        <br><br>
                    </div>
                </a>

            </div>
            <div class="col mx-2">

                <a id="K_pes" href="{{ route('search') }}?category=Zvieratá" class="card text-center mb-3 kategoria">
                    <div class="card-body pt-2 pb-2 px-1">
                        <br><br>
                    </div>
                </a>

            </div>
            <div class="col mx-2">

                <a id="K_naradie" href="{{ route('search') }}?category=Náradie" class="card text-center mb-3 kategoria">
                    <div class="card-body pt-2 pb-2 px-1">
                        <br><br>
                    </div>
                </a>

            </div>
        </div>
        <div class="row my-3">
            <div class="col mx-2">

                <a id="K_lopta" href="{{ route('search') }}?category=Šport" class="card text-center mb-3 kategoria">
                    <div class="card-body pt-2 pb-2 px-1">
                        <br><br>
                    </div>
                </a>

            </div>
            <div class="col mx-2">

                <a id="K_hudba" href="{{ route('search') }}?category=Hudba" class="card text-center mb-3 kategoria">
                    <div class="card-body pt-2 pb-2 px-1">
                        <br><br>
                    </div>
                </a>

            </div>
            <div class="col mx-2">

                <a id="K_pc" href="{{ route('search') }}?category=PC" class="card text-center mb-3 kategoria">
                    <div class="card-body pt-2 pb-2 px-1">
                        <br><br>
                    </div>
                </a>

            </div>
            <div class="col mx-2">

                <a id="K_knihy" href="{{ route('search') }}?category=Knihy" class="card text-center mb-3 kategoria">
                    <div class="card-body pt-2 pb-2 px-1">
                        <br><br>
                    </div>
                </a>

            </div>
        </div>
        <div class="row my-3">
            <div class="col mx-2">

                <a id="K_mobily" href="{{ route('search') }}?category=Mobily" class="card text-center mb-3 kategoria">
                    <div class="card-body pt-2 pb-2 px-1">
                        <br><br>
                    </div>
                </a>

            </div>
            <div class="col mx-2">

                <a id="K_fotak" href="{{ route('search') }}?category=Fotoaparáty" class="card text-center mb-3 kategoria">
                    <div class="card-body pt-2 pb-2 px-1">
                        <br><br>
                    </div>
                </a>

            </div>
            <div class="col mx-2">

                <a id="K_sluzby" href="{{ route('search') }}?category=Služby" class="card text-center mb-3 kategoria">
                    <div class="card-body pt-2 pb-2 px-1">
                        <br><br>
                    </div>
                </a>

            </div>
            <div class="col mx-2">

                <a id="K_ostatne" href="{{ route('search') }}?category=Ostatné" class="card text-center mb-3 kategoria">
                    <div class="card-body pt-2 pb-2 px-1">
                        <br><br>
                    </div>
                </a>

            </div>
        </div>
    </div>

    <div class="container mt-3 pt-2 najnovsieKon">
        <div class="row text-center najnovsieText">
            <p><ion-icon name="flame-sharp"></ion-icon> NOVÉ INZERÁTY <ion-icon name="flame-sharp"></ion-icon></p>
        </div>
    </div>

    <div class="container najnovsie">
        <div class="row">
            @foreach ($adverts as $ad)
                <div class="col-md-3 col-lg-2 col-sm-4 col-4">
                    <div class="tile">
                        <div class="tileUp" style="background-image: url('{{ $ad->photo ? asset('storage/' . $ad->photo) : asset('https://www.pacificfoodmachinery.com.au/media/catalog/product/placeholder/default/no-product-image-400x400.png') }}');">
                            <a href="#" class="toggle-favorite"
                               data-advert-id="{{ $ad->id }}"
                               data-csrf-token="{{ csrf_token() }}"
                               data-is-favorite="{{ FavoriteProduct::isFavorite(auth()->id(), $ad->id) ? 'true' : 'false' }}">
                                @if (FavoriteProduct::isFavorite(auth()->id(), $ad->id))
                                    <ion-icon name="heart-dislike-circle-outline"></ion-icon>
                                @else
                                    <ion-icon name="heart-circle-outline"></ion-icon>
                                @endif
                            </a>
                        </div>
                        <div class="tileDown">
                            <div class="text-wrap">
                                <a class="adTitle" href="/adverts/{{ $ad->id }}">
                                    <h5>{{ $ad->title }}</h5>
                                </a>
                            </div>
                            <div class="text-start text-wrap adShTitle">
                                <p class="mb-3">{{ $ad->short_desc }}</p>
                            </div>
                            <div class="text-start adPlace">
                                <p class="mb-0">{{ $ad->place }}</p>
                            </div>
                            <div class="text-start adPrice">
                                <p class="mb-0">{{ $ad->price }}€</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

@endsection
