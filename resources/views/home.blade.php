@php use App\Models\FavoriteProduct; @endphp
@extends('layouts.app')

@section('content')

    <div class="container-fluid px-5" id="pozadie-container" style="height: 300px">
        <div class="container px-5 hlObrDiv" style="height: 80%; position: relative">
            <div class="search" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); padding: 10px; border-radius: 5px;">
                <form method="GET" action="{{ route('advert.search', ['string' => '']) }}">
                    <input type="text" name="string" placeholder="Vyhľadávanie" class="vyhladavanie">
                    <button type="submit"><ion-icon name="search-outline"></ion-icon></button>
                </form>
            </div>
        </div>
    </div>

    <div class="container pt-1 px-4 kategorie" style="height: 400px">
        <div class="row my-3" style="height: 20%">
            <div class="col mx-2 " style="max-height: 100%">

                <a id="K_oblecenie" href="odkaz1.html" class="card text-center mb-3" style="max-height: 100%">
                    <div class="card-body pt-2 pb-2 px-1">
                        <br><br>
                    </div>
                </a>

            </div>
            <div class="col mx-2" style="max-height: 100%">

                <a id="K_auta" href="odkaz1.html" class="card text-center mb-3" style="max-height: 100%">
                    <div class="card-body pt-2 pb-2 px-1">
                        <br><br>
                    </div>
                </a>

            </div>
            <div class="col mx-2" style="max-height: 100%">

                <a id="K_dom" href="odkaz1.html" class="card text-center mb-3" style="max-height: 100%">
                    <div class="card-body pt-2 pb-2 px-1">
                        <br><br>
                    </div>
                </a>

            </div>
            <div class="col mx-2" style="max-height: 100%">

                <a id="K_deti" href="odkaz1.html" class="card text-center mb-3" style="max-height: 100%">
                    <div class="card-body pt-2 pb-2 px-1">
                        <br><br>
                    </div>
                </a>

            </div>
        </div>
        <div class="row my-3" style="height: 20%">
            <div class="col mx-2" style="max-height: 100%">

                <a id="K_motorka" href="odkaz1.html" class="card text-center mb-3" style="max-height: 100%">
                    <div class="card-body pt-2 pb-2 px-1">
                        <br><br>
                    </div>
                </a>

            </div>
            <div class="col mx-2" style="max-height: 100%">

                <a id="K_pohovka" href="odkaz1.html" class="card text-center mb-3" style="max-height: 100%">
                    <div class="card-body pt-2 pb-2 px-1">
                        <br><br>
                    </div>
                </a>

            </div>
            <div class="col mx-2" style="max-height: 100%">

                <a id="K_pes" href="odkaz1.html" class="card text-center mb-3" style="max-height: 100%">
                    <div class="card-body pt-2 pb-2 px-1">
                        <br><br>
                    </div>
                </a>

            </div>
            <div class="col mx-2" style="max-height: 100%">

                <a id="K_naradie" href="odkaz1.html" class="card text-center mb-3" style="max-height: 100%">
                    <div class="card-body pt-2 pb-2 px-1">
                        <br><br>
                    </div>
                </a>

            </div>
        </div>
        <div class="row my-3" style="height: 20%">
            <div class="col mx-2" style="max-height: 100%">

                <a id="K_lopta" href="odkaz1.html" class="card text-center mb-3" style="max-height: 100%">
                    <div class="card-body pt-2 pb-2 px-1">
                        <br><br>
                    </div>
                </a>

            </div>
            <div class="col mx-2" style="max-height: 100%">

                <a id="K_hudba" href="odkaz1.html" class="card text-center mb-3" style="max-height: 100%">
                    <div class="card-body pt-2 pb-2 px-1">
                        <br><br>
                    </div>
                </a>

            </div>
            <div class="col mx-2" style="max-height: 100%">

                <a id="K_pc" href="odkaz1.html" class="card text-center mb-3" style="max-height: 100%">
                    <div class="card-body pt-2 pb-2 px-1">
                        <br><br>
                    </div>
                </a>

            </div>
            <div class="col mx-2" style="max-height: 100%">

                <a id="K_knihy" href="odkaz1.html" class="card text-center mb-3" style="max-height: 100%">
                    <div class="card-body pt-2 pb-2 px-1">
                        <br><br>
                    </div>
                </a>

            </div>
        </div>
        <div class="row my-3" style="height: 20%">
            <div class="col mx-2" style="max-height: 100%">

                <a id="K_mobily" href="odkaz1.html" class="card text-center mb-3" style="max-height: 100%">
                    <div class="card-body pt-2 pb-2 px-1">
                        <br><br>
                    </div>
                </a>

            </div>
            <div class="col mx-2" style="max-height: 100%">

                <a id="K_fotak" href="odkaz1.html" class="card text-center mb-3" style="max-height: 100%">
                    <div class="card-body pt-2 pb-2 px-1">
                        <br><br>
                    </div>
                </a>

            </div>
            <div class="col mx-2" style="max-height: 100%">

                <a id="K_sluzby" href="odkaz1.html" class="card text-center mb-3" style="max-height: 100%">
                    <div class="card-body pt-2 pb-2 px-1">
                        <br><br>
                    </div>
                </a>

            </div>
            <div class="col mx-2" style="max-height: 100%">

                <a id="K_ostatne" href="odkaz1.html" class="card text-center mb-3" style="max-height: 100%">
                    <div class="card-body pt-2 pb-2 px-1">
                        <br><br>
                    </div>
                </a>

            </div>
        </div>
    </div>

    <div class="container mt-3 pt-2 najnovsieKon">
        <div class="row text-center najnovsieText" style="height: 10%; font-weight: bold; font-size: larger">
            <p><ion-icon name="flame-sharp"></ion-icon> NOVÉ INZERÁTY <ion-icon name="flame-sharp"></ion-icon></p>
        </div>
    </div>

    <div class="container najnovsie">
        <div class="row">
            @foreach ($adverts as $ad)
                <div class="col-md-3 col-lg-2 col-sm-4 col-4">
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

@endsection
