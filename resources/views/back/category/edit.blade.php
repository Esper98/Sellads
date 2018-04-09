@extends('layouts.back')

@section('content')
    
    <div id = "adminContainer">

        <div id ="adminContent">

            <h3>Categorie aanpassen</h3>
            @if(!$errors->isEmpty())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form action="{{ action('Back\CategoryController@update', $id) }}" method="post" >
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="PATCH">
                <input type="hidden" value="{{csrf_token()}}" name="_token" />
                <input name="id" type="hidden" value="{{$id}}">

                    <div class="input-group">
                        <label>Categorie Naam</label>
                        <input type="text" name="name" value="{{$data['category']->name}}">
                    </div>

                <div class="input-group">
                    <label>Waar is het een Subcategorie van?</label>
                    <select name = "subCategory">
                        <option value=""> </option>
                        <option selected hidden> {{$data['category']->parent}}</option>			
                        @foreach($data['categories'] as $category)
                            <option value='{{$category->name}}'> {{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="input-group">
                    <button type="submit" class="btn" name="editCategory">opslaan</button>
                </div>

            </form>
        </div>
    </div>
    
@endsection