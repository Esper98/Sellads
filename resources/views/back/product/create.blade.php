@extends('layouts.back')
@section('content')
    <h3>Product Toevoegen</h3>
    @if(!$errors->isEmpty())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form method="post" action="{{ action('Back\ProductController@store') }}" enctype="multipart/form-data">
    <input type="hidden" value="{{csrf_token()}}" name="_token" />
        <div class="input-group">
            <label>Product Naam</label>
            <input type="text" name="name" value="{{old('name')}}">
        </div>
        <div class="input-group">
            <label>Prijs</label>
            <input type="text" name="price" value="{{old('price')}}">
        </div>
        <div class="input-group">
            <label>Omschrijving</label>
            <input type="text" name="description" value="{{old('description')}}">

        </div>
        <div class="input-group">
            <label>Categorie</label>
            <select name = "category">
                <option selected hidden> {{old('category')}}</option>			
                @foreach($data['categories'] as $category)
                    <option value='{{$category->name}}'> {{$category->name}}</option>
                @endforeach
            </select>
        </div>

        <label for="imageInput">File input</label>
        <input data-preview="#preview" name="image" type="file" id="imageInput">

        <div class="input-group">
        <button type="submit" class="btn" name="store">opslaan</button>
        </div>
    </form>
@endsection