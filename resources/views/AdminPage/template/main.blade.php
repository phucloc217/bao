<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    @include('AdminPage.template.partials.loader')
    <link rel="stylesheet" href="{{url('')}}/AdminPage/css/app.css">
    {{-- <link href="{{url('')}}/admin/css/style.css" rel="stylesheet"> --}}
</head>

<body class="app">
    <div id="loader">
        <div class="spinner"></div>
    </div>
    <script>
        window.addEventListener('load', function load() {
            const loader = document.getElementById('loader');
            setTimeout(function() {
                loader.classList.add('fadeOut');
            }, 300);
        });
    </script>
    <div>
        @include('AdminPage.template.partials.sidebar')

        <div class="page-container">
            @include('AdminPage.template.partials.navbar')
            <main class="main-content bgc-grey-100">
                <div id="mainContent">
                    @yield('content')
                </div>
            </main>
            @include('AdminPage.template.partials.footer')
        </div>
    </div>
    <script src="{{url('')}}/AdminPage/js/app.js"></script>
    {{-- <script type="text/javascript" src="{{url('')}}/admin/js/vendor.js"></script>
    <script type="text/javascript" src="{{url('')}}/admin/js/bundle.js"></script> --}}
</body>

</html>