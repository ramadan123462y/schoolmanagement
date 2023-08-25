<div>
    <script>
        @if (Session::has('message'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.{{ $type }}("{{ session('message') }}");
        @endif
    </script>



</div>
