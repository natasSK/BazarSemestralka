@php use App\Models\FavoriteProduct; @endphp
@extends('layouts.app')

@section('content')
    <div class="container mt-2">
        <div class="row mb-2">
            <div class="col-md-4" id="user-profile">
                @if ($user->photo)
                    <img src="{{ asset('storage/' . $user->photo) }}" alt="Užívateľská fotka" class="img-fluid mb-3 rounded-2 userPhoto">
                @else
                    <img src="https://holmesbuilders.com/wp-content/uploads/2016/12/male-profile-image-placeholder.png" alt="Užívateľská fotka" class="img-fluid mb-3 rounded-2 userPhoto">
                @endif
                <h4>{{ $user->username }}</h4>
                @if ($user->name)
                    <p>Meno: {{ $user->name }}</p>
                @endif
                <p>Email: {{ $user->email }}</p>
                @if ($user->phone_number)
                    <p>Tel. č: {{ $user->phone_number }}</p>
                @endif

                @if ($user->district)
                    <p>Adresa: {{ $user->district }}</p>
                @endif

                <div class="rating"
                     data-user-id="{{ auth()->id() }}"
                     data-csrf-token="{{ csrf_token() }}">
                    <span data-rating="1"><ion-icon name="star-outline"></ion-icon></span>
                    <span data-rating="2"><ion-icon name="star-outline"></ion-icon></span>
                    <span data-rating="3"><ion-icon name="star-outline"></ion-icon></span>
                    <span data-rating="4"><ion-icon name="star-outline"></ion-icon></span>
                    <span data-rating="5"><ion-icon name="star-outline"></ion-icon></span>
                </div>
                <p class="GlobalAverageRating">Priemerné hodnotenie: <span id="average-rating">{{ $globalAverageRating }}</span></p>

            </div>
            <div class="col-md-8 mt-5 col-sm-5 col-5">
                <div class="container najnovsie">
                    <div class="row">
                        @foreach ($adverts as $ad)
                            <div class="col-md-6 col-lg-4">
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
                </div>
            </div>
            @auth
            <form action="{{ route('comment.store', ['id' => $user->id]) }}" method="POST" class="mt-4">
                @csrf
                <div class="mb-3">
                    <label for="comment" class="form-label">Pridaj / Uprav komentár:</label>
                    <textarea class="form-control" name="comment" id="comment" cols="30" rows="5"></textarea>
                </div>

                <div class="mb-3">
                    <label for="recommendation" class="form-label">Hodnotenie:</label>
                    <select class="form-select" name="recommendation" id="recommendation">
                        <option value="1">Odporúčam</option>
                        <option value="0">Neodporúčam</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Uverejni</button>
            </form>
            @endauth
            @forelse($user->comments as $comment)
                <div class="comment card mt-3">
                    <div class="card-body">
                        <p class="card-text">

                            <span class="badge bg-{{ $comment->recommendation == 1 ? 'success' : 'danger' }} fs-4">
                {{ $comment->recommendation == 1 ? 'Odporúčam' : 'Neodporúčam' }}
            </span>
                        </p>
                        <p class="card-text">{{ $comment->text }}</p>
                        <p class="card-subtitle text-muted">Uverejnené: {{ $comment->published_at }}</p>
                        <div class="d-flex align-items-center">
                            <a href="{{ url('/profile/' . $comment->author->id) }}">
                                @if ($user->photo)
                                    <img src="{{ asset('storage/' . $user->photo) }}" alt="Author's Photo" class="rounded-circle me-2" width="40" height="40">
                                @else
                                    <img src="https://holmesbuilders.com/wp-content/uploads/2016/12/male-profile-image-placeholder.png" alt="Author's Photo" class="rounded-circle me-2" width="40" height="40">
                                @endif
                            </a>
                            <p class="card-text">
                                <a href="{{ url('/profile/' . $comment->author->id) }}" class="text-decoration-none text-dark">
                                    {{ $comment->author->name }}
                                </a>
                            </p>

                        </div>
                        @can('delete', $comment)
                            <form action="{{ route('comment.destroy', ['id' => $comment->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger ms-auto mt-2">Vymaž</button>
                            </form>
                        @endcan
                    </div>
                </div>
            @empty
                <p class="mt-3 mb-2">Zatiaľ žiadne komentáre</p>
            @endforelse
        </div>
        </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
@endsection
