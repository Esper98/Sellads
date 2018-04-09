@extends('layouts.app')

@section('content')

    <div id="infoContainer">
    @if(\Session::has('success'))
        <div class="alert alert-success">
            {{\Session::get('success')}}
        </div>
    @endif
        <h1>winkelwagen</h1>
        @if(isset($products))
            @foreach ($products as $product)
                <hr>
                <div>
                    <div class="cartItem"> {{$product['name']}} aantal: {{$product['amount']}} prijs: {{$product['totalPrice']}} </div>
                    <form class ="formWidth" action="{{action('CartController@destroy', $product['name'])}}" method="post">{{csrf_field()}}
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn" type="submit">Delete</button>
                    </form>
                    <form class="formWidth" action="{{action('CartController@update', $product['name'])}}" method="get">{{csrf_field()}}
                        <input name="_method" type="hidden" value="update">
                        <button class="btn" type="submit">Update</button>
                        <input name="amount" type="number" value="{{$product['amount']}}" min="1" max="20"/>
                    </form>
                </div>
            @endforeach 
            
            <h2>Totale prijs:{{$totalPrice}}</h2>
            <form action="{{action('CartController@order')}}" method="post">{{csrf_field()}}
                <button class="btn" type="submit">Bestellen</button>
            </form>
        @endif
    </div>
@endsection