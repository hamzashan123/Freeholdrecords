<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="E-commerce Application">
    <meta name="author" content="Ali">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <title>{{ config('app.name', 'Laravel') }} | Admin Auth</title>
    <!-- Custom fonts for this template-->
    <link href="{{ asset('backend/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ asset('backend/css/sb-admin-2.css') }}" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/18.1.3/css/intlTelInput.css" integrity="sha512-Ky9SFgkYYIAWfFbsz+Tvrs+kpW7mgyQu+glUEnVV60+nxDPe64w0CrYRSMKsmTwJtN2jXNmU5SBgcyzKOwsn3w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/18.1.3/js/intlTelInput.min.js" integrity="sha512-8XuX34GV5xacR9b/Co1BXl4mwi6G/8Ro0iRE8lP1OL2wloXCnFQ4gEBk7lv3qTRVGKoT+pT9X1GH/LRp/Vqg5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @yield('styles')
</head>

<body class="bg-gradient-primary login">

    <div class="container login">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('backend/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('backend/js/sb-admin-2.min.js') }}"></script>

    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    <script>
        const phonereg = document.querySelector('#phonereg');
        const phoneInput2 = window.intlTelInput(phonereg, {
                
            initialCountry: 'uk',
            utilsScript: 'https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/18.1.3/js/intlTelInput.min.js',
        })
    </script>
    @yield('scripts')
</body>

</html>