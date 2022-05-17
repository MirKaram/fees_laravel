<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-gray-100  antialiased leading-none font-sans">
    
    <div class="flex justify-center m-h-screen ">
        <div class="p-0 mt-10 text-left bg-white shadow-lg rounded-xl">
            <div class=" px-16 text-white py-4 text-xl font-white  bg-gray-700 rounded-t-xl">
                Login to your account
            </div>
            
            <form class="m-10" method="POST" action="/login">
                {!! csrf_field() !!}
                <div class="mt-0">
                    <div>
                        <label for="email" class="block">Email</label>
                        <input type="email" name="email" placeholder="Email" class="w-full px-2 py-2 border rounded-md  focus:outline-none focus:ring-1 focus:ring-blue-600">
                    </div>

                    <div class="pt-6">
                        <label for="password" class="block">Password</label>
                        <input type="password" name="password" placeholder="Password" class="w-full px-2 py-2 border rounded-md  focus:outline-none focus:ring-blue-600">
                    </div>

                    @isset($error)
                    <div class="my-4 text-red-800 mr-2 flex-auto">
                        {{$error}}
                    </div>
                    @endisset

                    <div class="flex mt-10 justify-center">
                        <button type="submit" class="text-lg text-black p-1 w-full rounded-xl hover:bg-gray-400">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>