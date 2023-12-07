@extends('layouts.app')

@section('content')
    <div class="container mt-3 col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="row" style="height: 400px;">
            <div class="col-lg-5">
                <div class="container">
                    <img class="image-fluid" src="https://www.pacificfoodmachinery.com.au/media/catalog/product/placeholder/default/no-product-image-400x400.png" alt="Second slide" style="width: 400px; height: 400px">
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


                <div class="row my-2 mx-1 overflow-scroll overflow-x-hidden overflow-y-auto border-light-subtle" style="height: 45%; padding: 10px; border: 1px solid">
                    Základné parametre:

                    OS: Android 13 + MIUI 14

                    čipset: Qualcomm Snapdragon 8 Gen 2, 4 nm

                    procesor: osemjadrový, 1 x 3,2 GHz + 2 x 2,8 GHz + 2 x 2,8 GHz + 3 x 2,0 GHz

                    grafický procesor: Adreno 740

                    displej: 6,73'' (171 mm), LTPO OLED, 1440 x 3200 b., 1 - 120 Hz, HDR10+, 522 ppi, Gorilla Glass Victus, jas až 2600 nitov

                    zadný fotoaparát (23 mm): 50 Mpix, IMX989, f/1.9, f/4.0, video 8K (24 fps) / 4K (60 fps), AF, OIS

                    širokouhlý fotoaparát (12 mm): 50 Mpix, IMX858m f/1.8, 122°, AF, makro od 5 cm

                    teleobjektív (75 mm): 50 Mpix, IMX858, f/1.8, PDAF, OIS

                    periskopický teleobjektív (120 mm): 50 Mpix, IMX858, f/3.0, 5x optický zoom, PDAF, OIS

                    predný fotoaparát: 32 Mpix, f/2.0, video Full HD (30 fps)
                </div>
            </div>
            @can('update', $advert)
            <div class="container mt-1">
                <div class="row">
                    <div class="col-xxl-1 col-xl-10 mb-1">
                        <a href="/adverts/{{ $advert->id }}/edit" class="btn btn-warning btn-lg btn-block">Uprav</a>
                    </div>
                    <div class="col-xxl-1 col-xl-4">
                        <form method="POST" action="/adverts/{{ $advert->id }}/delete">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-lg btn-block">Zmaž</button>
                        </form>
                    </div>
                </div>
            </div>
            @endcan

        </div>

    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

@endsection
