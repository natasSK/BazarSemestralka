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
            <div class="col-md-4 col-lg-2 col-sm-4">
                <div class="tile">
                    <img src="/resources/img/auta.webp" alt="Obrázok" style="width: 100px; height: 100px">
                    <div class="text-block">
                        <h6>Xiaomi redmi note 9 pro plus</h6>
                    </div>
                    <div class="text-block">
                        <h7><ion-icon name="logo-euro" style="color: green"></ion-icon> 399</h7>
                    </div>
                    <div class="text-block">
                        <h7><ion-icon name="location-sharp" style="color: blue"></ion-icon> Skalité</h7>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-lg-2 col-sm-4">
                <div class="tile">
                    <img src="/resources/img/auta.webp" alt="Obrázok" style="width: 100px; height: 100px">
                    <div class="text-block">
                        <h6>Xiaomi redmi note 9 pro plus</h6>
                    </div>
                    <div class="text-block">
                        <h7><ion-icon name="logo-euro" style="color: green"></ion-icon> 399</h7>
                    </div>
                    <div class="text-block">
                        <h7><ion-icon name="location-sharp" style="color: blue"></ion-icon> Skalité</h7>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-2 col-sm-4">
                <div class="tile">
                    <img src="/resources/img/auta.webp" alt="Obrázok" style="width: 100px; height: 100px">
                    <div class="text-block">
                        <h6>Xiaomi redmi note 9 pro plus</h6>
                    </div>
                    <div class="text-block">
                        <h7><ion-icon name="logo-euro" style="color: green"></ion-icon> 399</h7>
                    </div>
                    <div class="text-block">
                        <h7><ion-icon name="location-sharp" style="color: blue"></ion-icon> Skalité</h7>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-2 col-sm-4">
                <div class="tile">
                    <img src="/resources/img/auta.webp" alt="Obrázok" style="width: 100px; height: 100px">
                    <div class="text-block">
                        <h6>Xiaomi redmi note 9 pro plus</h6>
                    </div>
                    <div class="text-block">
                        <h7><ion-icon name="logo-euro" style="color: green"></ion-icon> 399</h7>
                    </div>
                    <div class="text-block">
                        <h7><ion-icon name="location-sharp" style="color: blue"></ion-icon> Skalité</h7>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-2 col-sm-4">
                <div class="tile">
                    <img src="/resources/img/auta.webp" alt="Obrázok" style="width: 100px; height: 100px">
                    <div class="text-block">
                        <h6>Xiaomi redmi note 9 pro plus</h6>
                    </div>
                    <div class="text-block">
                        <h7><ion-icon name="logo-euro" style="color: green"></ion-icon> 399</h7>
                    </div>
                    <div class="text-block">
                        <h7><ion-icon name="location-sharp" style="color: blue"></ion-icon> Skalité</h7>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-2 col-sm-4">
                <div class="tile">
                    <img src="/resources/img/auta.webp" alt="Obrázok" style="width: 100px; height: 100px">
                    <div class="text-block">
                        <h6>Xiaomi redmi note 9 pro plus</h6>
                    </div>
                    <div class="text-block">
                        <h7><ion-icon name="logo-euro" style="color: green"></ion-icon> 399</h7>
                    </div>
                    <div class="text-block">
                        <h7><ion-icon name="location-sharp" style="color: blue"></ion-icon> Skalité</h7>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
