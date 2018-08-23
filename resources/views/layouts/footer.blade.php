        <footer class="blog-footer footer">
            <p>&copy; 2017 - 2018 by PHP-User.</p>
            <p><a href="#" id="back-to-top">Back to Top</a></p>
        </footer>

		<script src="{{ asset('js/app.js') }}" defer></script>

		<script>
	        window.onload = function () {
	        	@if(Session::has('success'))
	                toastr.success('{{ Session::get('success') }}');
	            @endif
	        }
	    </script>

	</body>
</html>
