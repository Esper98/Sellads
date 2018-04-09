@extends('layouts.back')

@section('content')

    <div id ="adminContent">

        <h3>Producten</h3>
        @if(\Session::has('success'))
                <div class="alert alert-success">
                    {{\Session::get('success')}}
                </div>
            @endif
        <table id="customers">
            <tr>
                <th>ID</th>
                <th>Naam</th>
                <th>Prijs</th>
                <th>Categorie</th>
                <th>Aanpassen</th>
                <th>Delete</th>
            </tr>
            
            @foreach($data['products'] as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->category_name}}</td>
                <td><a href="{{action('Back\ProductController@edit', $product['id'])}}" class="btn">Aanpassen</a></td> 
                <td>
                    <form action="{{action('Back\ProductController@destroy', $product->id)}}" method="post">{{csrf_field()}}
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn" type="submit">Delete</button>
                    </form>
                </td>
            </tr>

            @endforeach
        </table>


        <a href="{{action('Back\ProductController@create')}}" class="btn">Product Toevoegen</a>
    </div>
@endsection