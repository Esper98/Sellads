@extends('layouts.back')

@section('content')

    <div id ="adminContent">

    <h3>Bestellingen</h3>
    @if(\Session::has('success'))
            <div class="alert alert-success">
                {{\Session::get('success')}}
            </div>
        @endif
    <table id="customers">
        <tr>
            <th>ID</th>
            <th>Naam</th>
            <th>Email</th>
            <th>Delete</th>
        </tr>

        
        @foreach($data['orders'] as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order['user']->name}}</td>
                <td>{{$order['user']->email}}</td>
                <td>
                    <form action="{{action('Back\OrderController@destroy', $order->id)}}" method="post">{{csrf_field()}}
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>

        @endforeach
    </table>

    </div>
@endsection