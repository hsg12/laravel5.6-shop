@include('layouts.header')

	@include('layouts.navbar')

	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				@include('layouts.sidebar')
			</div>
			<div class="col-lg-9">
				@yield('content')
			</div>
		</div>
		

		
	</div>

@include('layouts.footer')