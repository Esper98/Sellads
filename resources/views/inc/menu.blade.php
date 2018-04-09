<div id="logo"><a href="/home"><img  src="/img/logo.png"></a></div>
<div id = "header"> 
	<nav>
		<ul>
		@foreach($menu['items'] as $menuItem)
			<li>
				@include('inc.menuItem', ['menu' => $menuItem])
			</li>
		@endforeach
		</ul>
	</nav>
</div>
