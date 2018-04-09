@extends('layouts.back')

@section('content')

    <div id ="adminContent">

        <h3>Categorieën</h3>
        @if(\Session::has('success'))
                <div class="alert alert-success">
                    {{\Session::get('success')}}
                </div>
            @endif
        <table id="customers">
            <tr>
                <th>Naam</th>
                <th>Aanpassen</th>
                <th>Delete</th>
            </tr>

            <tr>
            @foreach($data['categories'] as $category)
                <td>{{$category->name}}</td>
                <td><a href="{{action('Back\CategoryController@edit', $category['name'])}}" class="btn btn-primary">Aanpassen</a></td> 
                <td>
                    <form action="{{action('Back\CategoryController@destroy', $category->name)}}" method="post">{{csrf_field()}}
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>

                @endforeach
        </table>

        <!-- <a href="{{ URL::to('admin/toevoegen')}}">het</a> -->
        <a href="{{action('Back\CategoryController@create')}}" class="btn btn-primary">Categorie Toevoegen</a>
    </div>
@endsection