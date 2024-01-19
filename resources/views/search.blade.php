@extends('layouts.app')

@section('content')

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label for="cenaOd" class="form-label">Cena od</label>
                                <input type="text" class="form-control" id="cenaOd">
                            </div>
                            <div class="mb-3">
                                <label for="cenaDo" class="form-label">Cena do</label>
                                <input type="text" class="form-control" id="cenaDo">
                            </div>
                            <div class="mb-3">
                                <label for="lokalita" class="form-label">Lokalita</label>
                                <input type="text" class="form-control" id="lokalita">
                            </div>
                            <div class="mb-3">
                                <label for="kategoria1" class="form-label">Kategória</label>
                                <select class="form-select" id="kategoria1">
                                    <option value="moznost1">Možnosť 1</option>
                                    <option value="moznost2">Možnosť 2</option>
                                    <option value="moznost3">Možnosť 3</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="kategoria2" class="form-label">Stav</label>
                                <select class="form-select" id="kategoria2">
                                    <option value="moznost1">Možnosť 1</option>
                                    <option value="moznost2">Možnosť 2</option>
                                    <option value="moznost3">Možnosť 3</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="kategoria3" class="form-label">Inzerent</label>
                                <select class="form-select" id="kategoria3">
                                    <option value="moznost1">Možnosť 1</option>
                                    <option value="moznost2">Možnosť 2</option>
                                    <option value="moznost3">Možnosť 3</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Filtruj</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-9 vyhladavanieBox mt-2">
                <div class="d-flex">
                    <div class="container h-100">
                        <div class="d-flex justify-content-center h-100">
                            <div class="searchbar">
                                <input class="search_input" type="text" name="" placeholder="Vyhľadávanie...">
                                <a href="#" class="search_icon"><ion-icon name="search-outline"></ion-icon></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="justify-content-center mt-3">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 mt-3">
                        <div class="container najnovsie">
                            <div class="row">
                                    <div class="col-md-4 col-lg-3 col-sm-6 col-6">
                                        <a href="#" style="text-decoration: none; color: black">
                                            <div class="tile">
                                                <div class="tileUp" style="background-image: url('{{ asset('https://www.pacificfoodmachinery.com.au/media/catalog/product/placeholder/default/no-product-image-400x400.png') }}');">
                                                </div>
                                                <div class="tileDown">
                                                    <div class="text-wrap">
                                                        <h5>Title</h5>
                                                    </div>
                                                    <div class="text-start text-wrap" style="font-size: smaller">
                                                        <p class="mb-3">description</p>
                                                    </div>
                                                    <div class="text-start" style="color:dodgerblue">
                                                        <p class="mb-0">place</p>
                                                    </div>
                                                    <div class="text-start" style="color:mediumseagreen">
                                                        <p class="mb-0">money€</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <div class="col-md-4 col-lg-3 col-sm-6 col-6">
                                    <a href="#" style="text-decoration: none; color: black">
                                        <div class="tile">
                                            <div class="tileUp" style="background-image: url('{{ asset('https://www.pacificfoodmachinery.com.au/media/catalog/product/placeholder/default/no-product-image-400x400.png') }}');">
                                            </div>
                                            <div class="tileDown">
                                                <div class="text-wrap">
                                                    <h5>Title</h5>
                                                </div>
                                                <div class="text-start text-wrap" style="font-size: smaller">
                                                    <p class="mb-3">description</p>
                                                </div>
                                                <div class="text-start" style="color:dodgerblue">
                                                    <p class="mb-0">place</p>
                                                </div>
                                                <div class="text-start" style="color:mediumseagreen">
                                                    <p class="mb-0">money€</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-4 col-lg-3 col-sm-6 col-6">
                                    <a href="#" style="text-decoration: none; color: black">
                                        <div class="tile">
                                            <div class="tileUp" style="background-image: url('{{ asset('https://www.pacificfoodmachinery.com.au/media/catalog/product/placeholder/default/no-product-image-400x400.png') }}');">
                                            </div>
                                            <div class="tileDown">
                                                <div class="text-wrap">
                                                    <h5>Title</h5>
                                                </div>
                                                <div class="text-start text-wrap" style="font-size: smaller">
                                                    <p class="mb-3">description</p>
                                                </div>
                                                <div class="text-start" style="color:dodgerblue">
                                                    <p class="mb-0">place</p>
                                                </div>
                                                <div class="text-start" style="color:mediumseagreen">
                                                    <p class="mb-0">money€</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-4 col-lg-3 col-sm-6 col-6">
                                    <a href="#" style="text-decoration: none; color: black">
                                        <div class="tile">
                                            <div class="tileUp" style="background-image: url('{{ asset('https://www.pacificfoodmachinery.com.au/media/catalog/product/placeholder/default/no-product-image-400x400.png') }}');">
                                            </div>
                                            <div class="tileDown">
                                                <div class="text-wrap">
                                                    <h5>Title</h5>
                                                </div>
                                                <div class="text-start text-wrap" style="font-size: smaller">
                                                    <p class="mb-3">description</p>
                                                </div>
                                                <div class="text-start" style="color:dodgerblue">
                                                    <p class="mb-0">place</p>
                                                </div>
                                                <div class="text-start" style="color:mediumseagreen">
                                                    <p class="mb-0">money€</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-4 col-lg-3 col-sm-6 col-6">
                                    <a href="#" style="text-decoration: none; color: black">
                                        <div class="tile">
                                            <div class="tileUp" style="background-image: url('{{ asset('https://www.pacificfoodmachinery.com.au/media/catalog/product/placeholder/default/no-product-image-400x400.png') }}');">
                                            </div>
                                            <div class="tileDown">
                                                <div class="text-wrap">
                                                    <h5>Title</h5>
                                                </div>
                                                <div class="text-start text-wrap" style="font-size: smaller">
                                                    <p class="mb-3">description</p>
                                                </div>
                                                <div class="text-start" style="color:dodgerblue">
                                                    <p class="mb-0">place</p>
                                                </div>
                                                <div class="text-start" style="color:mediumseagreen">
                                                    <p class="mb-0">money€</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
