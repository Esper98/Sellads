@extends('layouts.app')

@section('content')
    <div id="ProductSalade">
        <h1>Dorst?</h1>
        Bekijk onze nieuwste gezonde shakes
    </div>
    <div id='infoContainer'>
        <h3>Producten</h3>
        <div id='productenContainer'>

            <div id = "infoLeft">
                <form method="GET">
                    {{csrf_field()}}
                    zoeken
                    <input type="search" name="search" id ="search" placeholder="@if(isset($search)) {{$search}} @else zoeken... @endif ">
                </form>
            </div>
        <div id ="productenGrid">
            @foreach($data['products'] AS $product)    
                <div class='product'>
                    <a href="producten/{{$product->id}}">
                        <img alt="" id=productPlaatje src='img/{{$product->image}}'>
                        <h3>{{$product->name}}</h3>
                        <label>&euro;{{$product->price}}</label>
                    </a>
                    <form action="{{action('CartController@store', $product->name)}}" method="POST">{{csrf_field()}}
                        <label>Aantal</label>
                        <input name="amount" type="number" value="1" min="1" max="20"/>
                        <button type="submit" class="btn" name="store">Toevoegen aan winkelwagen</button>
                    </form>     
                </div>       
            @endforeach
        </div>
    </div>
@endsection