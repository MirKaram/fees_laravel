@extends('layout.app')
@section('content')
    <div class="m-auto w-4/5 py-24">
        <div class="text-center">
            <h2 class="text-5xl uppercase bold">
                This is Program Page
            </h2>
            <p class="text-ml italic">
                Total =  programs
            </p>
        </div>

        <div class="pt-10">
            <a href="cars/create" class="border-b-2 pb-2 border-dotted italic text-gray-500">
                Add new carr&rarr;
            </a>
        </div>
        <div class="w-5/6 py-10">
           <h3>Data came here</h3>
        </div>
    </div>
@endsection
