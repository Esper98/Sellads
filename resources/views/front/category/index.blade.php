@extends('layouts.app')
@section('content')
    <div id="ProductSalade">
        <h1>Dorst?</h1>
            Bekijk onze nieuwste gezonde shakes
    </div>
    <div id="infoContainer">
        <h3>Categorieën</h3>
        <div id ="categorieen">
            @foreach($data['categories'] as $category)
                <div class ='categorie'>
                    <a href="categorieën/{{$category->name}}">
                        <div class='categorieText'>{{$category->name}}</div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection