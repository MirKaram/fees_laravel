<!DOCTYPE html>
<html>
    <head>
        <title>Test Page</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" >
        <!-- <link href="/dist/output.css" rel="stylesheet"> -->
    </head>
<body >
    <p>{{ asset('css/app.css') }}</p>
    @include('layout.header')

    @yield('content')

    @include('layout.footer')


</body>
</html>
