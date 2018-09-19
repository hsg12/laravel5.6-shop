<script>
    window.onload = function () {
        @if(Session::has('success'))
            toastr.success('{{ Session::get('success') }}');
        @elseif(Session::has('error'))
            toastr.error('{{ Session::get('error') }}');
        @endif
    }
</script>
