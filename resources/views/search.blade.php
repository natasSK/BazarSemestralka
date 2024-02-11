@php use App\Models\FavoriteProduct; @endphp
@extends('layouts.app')

@section('content')
    <form method="GET" action="{{ route('search') }}">
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                            <div class="mb-3">
                                <label for="cenaOd" class="form-label">Cena od</label>
                                <input type="text" class="form-control" id="cenaOd" name="cenaOd" placeholder="Zadajte minimálnu cenu">
                            </div>
                            <div class="mb-3">
                                <label for="cenaDo" class="form-label">Cena do</label>
                                <input type="text" class="form-control" id="cenaDo" name="cenaDo" placeholder="Zadajte maximálnu cenu">
                            </div>
                            <div class="mb-3">
                                <label for="place" class="form-label">Lokalita</label>
                                <select class="form-select" id="place" name="place">
                                    <option value="Nevybrane">Nevybrané</option>
                                    <option value="Banská Bystrica">Banská Bystrica</option>
                                    <option value="Banská Štiavnica">Banská Štiavnica</option>
                                    <option value="Bardejov">Bardejov</option>
                                    <option value="Bánovce nad Bebravou">Bánovce nad Bebravou</option>
                                    <option value="Brezno">Brezno</option>
                                    <option value="Bratislava I">Bratislava I</option>
                                    <option value="Bratislava II">Bratislava II</option>
                                    <option value="Bratislava III">Bratislava III</option>
                                    <option value="Bratislava IV">Bratislava IV</option>
                                    <option value="Bratislava V">Bratislava V</option>
                                    <option value="Bytča">Bytča</option>
                                    <option value="Čadca">Čadca</option>
                                    <option value="Detva">Detva</option>
                                    <option value="Dolný Kubín">Dolný Kubín</option>
                                    <option value="Dunajská Streda">Dunajská Streda</option>
                                    <option value="Galanta">Galanta</option>
                                    <option value="Gelnica">Gelnica</option>
                                    <option value="Hlohovec">Hlohovec</option>
                                    <option value="Humenné">Humenné</option>
                                    <option value="Ilava">Ilava</option>
                                    <option value="Kežmarok">Kežmarok</option>
                                    <option value="Komárno">Komárno</option>
                                    <option value="Košice I">Košice I</option>
                                    <option value="Košice II">Košice II</option>
                                    <option value="Košice III">Košice III</option>
                                    <option value="Košice IV">Košice IV</option>
                                    <option value="Košice-okolie">Košice-okolie</option>
                                    <option value="Krupina">Krupina</option>
                                    <option value="Kysucké Nové Mesto">Kysucké Nové Mesto</option>
                                    <option value="Levice">Levice</option>
                                    <option value="Levoča">Levoča</option>
                                    <option value="Liptovský Mikuláš">Liptovský Mikuláš</option>
                                    <option value="Lučenec">Lučenec</option>
                                    <option value="Malacky">Malacky</option>
                                    <option value="Martin">Martin</option>
                                    <option value="Medzilaborce">Medzilaborce</option>
                                    <option value="Michalovce">Michalovce</option>
                                    <option value="Myjava">Myjava</option>
                                    <option value="Námestovo">Námestovo</option>
                                    <option value="Nitra">Nitra</option>
                                    <option value="Nové Mesto nad Váhom">Nové Mesto nad Váhom</option>
                                    <option value="Nové Zámky">Nové Zámky</option>
                                    <option value="Partizánske">Partizánske</option>
                                    <option value="Pezinok">Pezinok</option>
                                    <option value="Piešťany">Piešťany</option>
                                    <option value="Poltár">Poltár</option>
                                    <option value="Poprad">Poprad</option>
                                    <option value="Považská Bystrica">Považská Bystrica</option>
                                    <option value="Prešov">Prešov</option>
                                    <option value="Prievidza">Prievidza</option>
                                    <option value="Púchov">Púchov</option>
                                    <option value="Revúca">Revúca</option>
                                    <option value="Rimavská Sobota">Rimavská Sobota</option>
                                    <option value="Rožňava">Rožňava</option>
                                    <option value="Ružomberok">Ružomberok</option>
                                    <option value="Sabinov">Sabinov</option>
                                    <option value="Senec">Senec</option>
                                    <option value="Senica">Senica</option>
                                    <option value="Skalica">Skalica</option>
                                    <option value="Snina">Snina</option>
                                    <option value="Sobrance">Sobrance</option>
                                    <option value="Spišská Nová Ves">Spišská Nová Ves</option>
                                    <option value="Stará Ľubovňa">Stará Ľubovňa</option>
                                    <option value="Stropkov">Stropkov</option>
                                    <option value="Svidník">Svidník</option>
                                    <option value="Šaľa">Šaľa</option>
                                    <option value="Topoľčany">Topoľčany</option>
                                    <option value="Trebišov">Trebišov</option>
                                    <option value="Trenčín">Trenčín</option>
                                    <option value="Trnava">Trnava</option>
                                    <option value="Turčianske Teplice">Turčianske Teplice</option>
                                    <option value="Tvrdošín">Tvrdošín</option>
                                    <option value="Veľký Krtíš">Veľký Krtíš</option>
                                    <option value="Vranov nad Topľou">Vranov nad Topľou</option>
                                    <option value="Zlaté Moravce">Zlaté Moravce</option>
                                    <option value="Zvolen">Zvolen</option>
                                    <option value="Žarnovica">Žarnovica</option>
                                    <option value="Žiar nad Hronom">Žiar nad Hronom</option>
                                    <option value="Žilina">Žilina</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label">Kategória</label>
                                <select class="form-select" id="category" name="category">
                                    <option value="Nevybrane">Nevybrané</option>
                                    <option value="Oblečenie">Oblečenie</option>
                                    <option value="Auto">Auto</option>
                                    <option value="Reality">Reality</option>
                                    <option value="Deti">Deti</option>
                                    <option value="Motorky">Motorky</option>
                                    <option value="Zvieratá">Zvieratá</option>
                                    <option value="Nábytok">Nábytok</option>
                                    <option value="Náradie">Náradie</option>
                                    <option value="Šport">Šport</option>
                                    <option value="Hudba">Hudba</option>
                                    <option value="PC">PC</option>
                                    <option value="Knihy">Knihy</option>
                                    <option value="Mobily">Mobily</option>
                                    <option value="Fotoaparáty">Fotoaparáty</option>
                                    <option value="Služby">Služby</option>
                                    <option value="Ostatné">Ostatné</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="type" class="form-label">Stav</label>
                                <select class="form-select" id="type" name="type">
                                    <option value="Nevybrane">Nevybrané</option>
                                    <option value="Nové">Nové</option>
                                    <option value="Používané">Používané</option>
                                    <option value="Handmade">Handmade</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Filtruj</button>
                    </div>
                </div>
            </div>

            <div class="col-md-9 vyhladavanieBox mt-2">
                <div class="d-flex">
                    <div class="container h-100">
                        <div class="d-flex justify-content-center h-100">
                                <div class="searchbar">
                                    <input class="search_input" type="text" name="string" placeholder="Vyhľadávanie...">
                                    <button type="submit" class="search_icon">
                                        <ion-icon name="search-outline"></ion-icon>
                                    </button>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="justify-content-center mt-3">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 mt-3">
                        <div class="container najnovsie">
                            <div class="row">
                                @foreach ($adverts as $ad)
                                    <div class="col-md-4 col-lg-3 col-sm-6 col-6">
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
                </div>
            </div>
        </div>
    </div>
    </form>
@endsection
