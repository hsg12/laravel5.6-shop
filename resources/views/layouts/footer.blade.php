        <footer class="blog-footer footer">
            <p class="footer-vertical-aligment">&copy; {{ getYear() }} by PHP-User.</p>
            <p id="back-to-top-container"><a href="#" id="back-to-top">Back to Top</a></p>
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
