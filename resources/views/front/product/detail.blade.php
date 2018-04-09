@extends('layouts.app')
@section('content')
    <div id="ProductSalade">
        <h1>Dorst?</h1>
            Bekijk onze nieuwste gezonde shakes
    </div>
    <div id="infoContainer">
        <h3>Product</h3>
            <div id="productBreadcrums">
                <h6>
                    @if(isset($data['category']->parent))
                        {{$data['category']->parent}} > 
                    @endif
                    {{$data['product']->category_name}} > 
                    {{$data['product']->name}}
                <h2>{{$data['product']->name}}</h2>
            </div>
        <div id="container">
            <div id="product">
                <img alt="" id="detailProdcutImage" src="/img/{{$data['product']->image}}">
            </div>	
            <div id="productOmschrijving">
                {{$data['product']->description}}
                <form method="post" action="{{ action('CartController@store', $data['product']->name) }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input name="amount" type="number" value="1" min="1" max="20"/>
                    <button type="submit" class="btn" name="store">Toevoegen aan winkelwagen</button>
                </from>
            </div>
        </div>
    </div>
@endsection