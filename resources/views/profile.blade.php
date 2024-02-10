@php use App\Models\FavoriteProduct; @endphp
@extends('layouts.app')

@section('content')
    <div class="container mt-2">
        <div class="row">
            <!-- Ľavý panel s profilom užívateľa -->
            <div class="col-md-4" id="user-profile" style="height: 30%">
                <img src="https://holmesbuilders.com/wp-content/uploads/2016/12/male-profile-image-placeholder.png"
                     alt="Užívateľská fotka" class="img-fluid mb-3 rounded-2" style="height: 300px; width: 300px">
                <h4>{{ $user->username }}</h4>
                <div class="rating" style="font-size: 32px; color: orange">
                    <span data-rating="1"><ion-icon name="star-outline"></ion-icon></span>
                    <span data-rating="2"><ion-icon name="star-outline"></ion-icon></span>
                    <span data-rating="3"><ion-icon name="star-outline"></ion-icon></span>
                    <span data-rating="4"><ion-icon name="star-outline"></ion-icon></span>
                    <span data-rating="5"><ion-icon name="star-outline"></ion-icon></span>
                </div>
                <p>Email: {{ $user->email }}</p>
                @can('create', $user)
                    <a href="/a/create" class="btn btn-info btn-lg btn-block">Pridaj</a>
                @endcan

            </div>
            <!-- Pravý panel s inzerátmi (tiles) -->
            <div class="col-md-8 mt-5">
                <div class="container najnovsie">
                    <div class="row">
                        @foreach ($adverts as $ad)
                            <div class="col-md-6 col-lg-4">
                                    <div class="tile">
                                        <div class="tileUp" style="background-image: url('{{ asset('https://www.pacificfoodmachinery.com.au/media/catalog/product/placeholder/default/no-product-image-400x400.png') }}');">
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
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
@endsection
