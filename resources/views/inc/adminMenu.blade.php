<div id = "adminMenu"> 
    <nav>
        <ul>
            @foreach($menu['menu'] as $menuItem)
                <li>
                    <a href="/{{$menuItem->link}}">{{$menuItem->name}}</a>
                </li>
            @endforeach
        </ul>
    </nav>
</div>