<!-- COMMON SCRIPTS -->
<script src="{{ asset('js/common_scripts.js') }}"></script>
<script src="{{ asset('js/functions.js') }}"></script>
<script src="{{ asset('assets/validate.js') }}"></script>
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
<script src="{{ asset('js/typeahead.bundle.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<!-- SPECIFIC SCRIPTS -->
<script src="{{ asset('js/jquery.cookiebar.js') }}"></script>
<script>
    (function ($) {
        'use strict';
        $.cookieBar({
            fixed: true
        });
    })(window.jQuery);
</script>
