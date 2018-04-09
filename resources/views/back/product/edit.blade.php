@extends('layouts.back')

@section('content')
    
    <div id = "adminContainer">

    <div id ="adminContent">

    <h3>Product aanpassen</h3>
        @if(!$errors->isEmpty())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        
         <form action="{{ action('Back\ProductController@update', $id) }}" method="post" enctype="multipart/form-data">
         {{ csrf_field() }}
         <input name="_method" type="hidden" value="PUT">
         <input name="id" type="hidden" value="{{$data['product']->id}}">

         <input type="hidden" value="{{csrf_token()}}" name="_token" />

            <div class="input-group">
                <label>Product Naam</label>
                <input type="text" name="name" value="{{$data['product']->name}}">
            </div>
            <div class="input-group">
                <label>Prijs</label>
                <input type="text" name="price" value="{{$data['product']->price}}">
            </div>
            <div class="input-group">
                <label>Omschrijving</label>
                <input type="text" name="description" value="{{$data['product']->description}}">
            </div>
		    <div class="input-group">
  	            <label>Categorie</label>
			    <select name = "category">
			    <option selected hidden> {{$data['product']->category_name}}</option>
			
                    @foreach($data['categories'] as $category)
                        <option value='{{$category->name}}'> {{$category->name}}</option>
                    @endforeach
                </select>
              </div>
              
              <label for="imageInput">File input</label>
              <input data-preview="#preview" name="image" type="file" id="imageInput" value="public/img/value='{{$data['product']->image}}">

            <div class="input-group">
            <button type="submit" class="btn" name="editProduct">opslaan</button>
            </div>

</form>
    </div>
    </div>
    
@endsection