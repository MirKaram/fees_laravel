@extends('layout.app')
@section('content')
<div class="flex content-center">
    <div class="m-auto ">
        <div class="flex justify-center m-10 gap-6">
            <div class="card ">
                <div class="text-3xl font-bold ">
                    Total Students : {{ $students}}
                </div>
                <div class="flex flex-col gap-2">
                    <div class="card text-2x font-bold ">
                        Paid Students : {{ $students}}
                    </div>
                    <div class="card text-2x font-bold ">
                        Unpaid Students : {{ $students}}
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="text-3xl font-bold ">
                    Total Fees : {{ $fees_collected}}
                </div>
                <div class="flex flex-col gap-2">
                    <div class="card text-2x font-bold ">
                        Collected Amount: {{ $students}}
                    </div>
                    <div class="card text-2x font-bold ">
                        Uncollected Amount : {{ $students}}
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="text-3xl font-bold ">
                    Fee Collection State
                </div>
                <form action="update_program_state" method="post">
                    @csrf
                    <div class="flex flex-col gap-2">
                        @foreach($programs as $item)
                        <div class="card text-2x font-bold ">
                            <label for="{{$item->id}}" class="flex items-center cursor-pointer relative">
                                <input type="checkbox" value="true" name="{{$item->id}}" id="{{$item->id}}" class="sr-only" {{$item->payment_active ? 'checked' : ''}}>
                                <div class="toggle-bg bg-gray-200 border-2 border-gray-200 h-6 w-11 rounded-full"></div>
                                <span class="ml-3 text-gray-900 text-sm font-medium on">{{$item->name}}</span>
                            </label>
                        </div>
                        @endforeach
                        <button class=" bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline" type="submit">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <img class="card p-0" src="{{ asset('storage/test.png') }}" />
        <!-- Button trigger modal -->
<button type="button" class="px-6
      py-2.5
      bg-blue-600
      text-white
      font-medium
      text-xs
      leading-tight
      uppercase
      rounded
      shadow-md
      hover:bg-blue-700 hover:shadow-lg
      focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
      active:bg-blue-800 active:shadow-lg
      transition
      duration-150
      ease-in-out" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
  id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog relative w-auto pointer-events-none">
    <div
      class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
      <div
        class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
        <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalLabel">Modal title</h5>
        <button type="button"
          class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
          data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body relative p-4">
        Modal body text goes here.
      </div>
      <div
        class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
        <button type="button" class="px-6
          py-2.5
          bg-purple-600
          text-white
          font-medium
          text-xs
          leading-tight
          uppercase
          rounded
          shadow-md
          hover:bg-purple-700 hover:shadow-lg
          focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0
          active:bg-purple-800 active:shadow-lg
          transition
          duration-150
          ease-in-out" data-bs-dismiss="modal">Close</button>
        <button type="button" class="px-6
      py-2.5
      bg-blue-600
      text-white
      font-medium
      text-xs
      leading-tight
      uppercase
      rounded
      shadow-md
      hover:bg-blue-700 hover:shadow-lg
      focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
      active:bg-blue-800 active:shadow-lg
      transition
      duration-150
      ease-in-out
      ml-1">Save changes</button>
      </div>
    </div>
  </div>
</div>
        </div>
    </div>
</div>
@endsection