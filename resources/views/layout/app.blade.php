<!DOCTYPE html>
<html>
    <head>
        <title>Test Page</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" >
        <!-- <link href="/dist/output.css" rel="stylesheet"> -->
        <!-- <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"> -->
    </head>
<body>
    @include('layout.header')

    @yield('content')

    @include('layout.footer')


</body>
</html>
