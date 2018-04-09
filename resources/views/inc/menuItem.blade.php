<a href="/{{$menu->link}}">{{$menu->name}}</a>
@if(isset($menu['subCategories']))
    <ul>
        @foreach($menu['subCategories'] as $subitem)
            <li>    
                @include('inc.menuItem', ['menu' => $subitem])
            </li>
        @endforeach
    </ul>
@endif

