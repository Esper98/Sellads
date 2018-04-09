@extends('layouts.back')

@section('content')
    <h3>Categorie Toevoegen</h3>
    @if(!$errors->isEmpty())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach        </ul>
    @endif
    <form method="post" action="{{ action('Back\CategoryController@store') }}">
    <input type="hidden" value="{{csrf_token()}}" name="_token" />
    
        <div class="input-group">
            <label>Categorie Naam</label>
            <input type="text" name="name" value="{{old('name')}}">
        </div>

        <div class="input-group">
            <label>Waar is het een Subcategorie van?</label>
            <select name = "subCategory">
                <option selected hidden> {{old('category')}}</option>			
                @foreach($data['categories'] as $category)
                    <option value='{{$category->name}}'> {{$category->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="input-group">
            <button type="submit" class="btn" name="store">opslaan</button>
        </div>
    </form>
@endsection