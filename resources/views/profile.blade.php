@extends('layouts.app')

@section('content')
<div class="container mt-2">
    <div class="row">
        <!-- Ľavý panel s profilom užívateľa -->
        <div class="col-md-4" id="user-profile" style="height: 30%">
            <img src="https://holmesbuilders.com/wp-content/uploads/2016/12/male-profile-image-placeholder.png" alt="Užívateľská fotka" class="img-fluid mb-3 rounded-2" style="height: 300px; width: 300px">
            <h4>{{ $user->username }}</h4>
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
                                <a href="{{ route('advert.show', ['advert' => $ad->id]) }}" style="text-decoration: none; color: black">
                                <div class="tile">
                                    <div class="tileUp" style="background-image: url('{{ asset('https://www.pacificfoodmachinery.com.au/media/catalog/product/placeholder/default/no-product-image-400x400.png') }}');">
                                    </div>
                                    <div class="tileDown">
                                        <div class="text-wrap">
                                            <h5>{{ $ad->title }}</h5>
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
                                </a>
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
