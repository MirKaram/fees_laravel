@extends('layout.app')
@section('content')
    <div class="m-auto w-4/5 py-24">
        <div class="text-center">
            <h2 class="text-5xl uppercase bold">
                This is car Page
            </h2>
            <p class="text-ml italic" >
                Total = {{ $cars->count() }} cars
            </p>
        </div>

        <div class="pt-10">
            <a href="cars/create" class="border-b-2 pb-2 border-dotted italic text-gray-500">
                Add new carr&rarr;
            </a>
        </div>
        <div class="w-5/6 py-10">
           @foreach ($cars as $item)
           <div class="m-auto">
            <span class="uppercase text-blue-500 font-bold text-xs italic">
                Founded: {{ $item->founded }}
            </span>
            <h2 class="text-5xl text-gray-500">
                {{ $item->name }}
            </h2>
            <p class="text-lg text-gray-700 py-6">
                {{ $item->description }}
            </p>
            <hr class="mt-4 mb-8">
        </div>
           @endforeach
        </div>
    </div>
@endsection
