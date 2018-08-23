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
