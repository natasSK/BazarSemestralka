@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col offset-2 my-2">
            <h1>Uprav inzerát</h1>
        </div>
        <form action="/adverts/{{ $advert->id }}" enctype="multipart/form-data" method="post">
            @csrf
            @method('PATCH')

            <div class="row my-3">
                <label for="image" class="col-md-4 col-form-label text-md-end col-lg-4 col-xl-3 col-xxl-3">{{ __('Fotka') }}</label>
                <div class="col-md-6">
                    <input id="image" type="file" class="form-control-file @error('image') is-invalid @enderror" name="image" value="{{ old('image')}}">

                    @error('image')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>
            </div>

            <div class="row my-3">
                <label for="title" class="col-md-4 col-form-label text-md-end col-lg-4 col-xl-3 col-xxl-3">{{ __('Názov') }}</label>
                <div class="col-md-6">
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $advert->title }}" autocomplete="title">

                    @error('title')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>
            </div>

            <div class="row my-3">
                <label for="place" class="col-md-4 col-form-label text-md-end col-lg-4 col-xl-3 col-xxl-3">{{ __('Okres') }}</label>
                <div class="col-md-6">

                    <select id="place" class="form-control @error('place') is-invalid @enderror" value="{{ old('place') ?? $advert->place}}" name="place" autocomplete="place">
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

                    @error('place')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>
            </div>

            <div class="row my-3">
                <label for="category" class="col-md-4 col-form-label text-md-end col-lg-4 col-xl-3 col-xxl-3">{{ __('Kategórie') }}</label>
                <div class="col-md-6">
                    <select id="category" class="form-control @error('category') is-invalid @enderror" value="{{ old('place') ?? $advert->category}}" name="category" autocomplete="category">
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

                    @error('category')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                </div>
            </div>

            <div class="row my-3">
                <label for="type" class="col-md-4 col-form-label text-md-end col-lg-4 col-xl-3 col-xxl-3">{{ __('Stav') }}</label>
                <div class="col-md-6">
                    <select id="type" class="form-control @error('type') is-invalid @enderror" value="{{ old('place') ?? $advert->type}}" name="type" autocomplete="type">
                        <option value="Nové">Nové</option>
                        <option value="Používané">Používané</option>
                        <option value="Handmade">Handmade</option>
                    </select>
                    @error('type')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                </div>
            </div>

            <div class="row my-3">
                <label for="price" class="col-md-4 col-form-label text-md-end col-lg-4 col-xl-3 col-xxl-3">{{ __('Cena') }}</label>
                <div class="col-md-6">
                    <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') ?? $advert->price}}" autocomplete="price">

                    @error('price')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>
            </div>

            <div class="row my-3">
                <label for="short_desc" class="col-md-4 col-form-label text-md-end col-lg-4 col-xl-3 col-xxl-3">{{ __('Krátky popis') }}</label>
                <div class="col-md-6">
                    <input id="short_desc" type="text" class="form-control @error('short_desc') is-invalid @enderror" name="short_desc" value="{{ old('short_desc') ?? $advert->short_desc}}" autocomplete="short_desc">

                    @error('short_desc')
                    <span class="invalid-feedback" role="alert">
                    <l>{{ $message }}</l>
                </span>
                    @enderror
                </div>
            </div>

            <div class="row my-3">
                <label for="description" class="col-md-4 col-form-label text-md-end col-lg-4 col-xl-3 col-xxl-3">{{ __('Popis') }}</label>
                <div class="col-md-6">
                    <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('price') ?? $advert->description}}" autocomplete="description">{{ old('description') }}</textarea>

                    @error('description')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                </div>
            </div>

            <div class="row my-3">
                <div class="col-1 offset-md-8">
                    <button class="btn btn-primary" type="submit">Uprav</button>
                </div>
            </div>
        </form>
    </div>

@endsection
