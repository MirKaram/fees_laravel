@extends('layout.app')
@section('content')
    <div class="m-auto w-4/8 py-14">
        <div class="text-center">
            <h1 class="text-5xl bold uppercase">
                Create A Car
            </h1>
        </div>
    </div>

    <div class="flex justify-center  pt-5">
        <form action="/cars" method="POST">
            @csrf
            <div class="block">
                <input type="text"
                required
                class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                name="name"
                placeholder="Brand Name">
            </div>
            <div class="block">
                <input type="number"
                class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                name="found"
                required
                placeholder="found year">
            </div>
            <div class="block">
                <input type="text"
                required
                class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                name="description"
                placeholder="Description">
            </div>
            <div class="block">
                <input type="text"
                required
                class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                name="product_code"
                placeholder="Product Code">
            </div>
            <div class="block">
                <input type="phone"
                required
                class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                name="phone_number"
                placeholder="Phone Numbe">
            </div>
            <Button type="submit" class="bg-green-500 w-80 block shadow-5xl p-2 mb-10 uppercase font-bold">
                Save
            </Button>
        </form>
      </div>


@endsection
