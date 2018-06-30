@include('layouts.header')

	@include('layouts.navbar')

	<div class="container">
		@yield('content')
	</div>

@include('layouts.footer')