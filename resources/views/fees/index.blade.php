@extends('layout.app')
@section('content')
<div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-10">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="pl-2 py-3">
                    Roll No
                </th>
                <th scope="col" class="px-2 py-3">
                    Name
                </th>
                <th scope="col" class="pl-2 py-3">
                    Program
                </th>
                <th scope="col" class="pl-2 py-3">
                    Semester
                </th>
                <th scope="col" class="pl-2 py-3">
                    Amount
                </th>
                <th scope="col" class="pl-2 py-3">
                    State
                </th>
                <th scope="col" class="pl-2 py-3">
                    Receipt
                </th>
                <th scope="col" class="pl-2 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($dataList as $item)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="pl-2 py-4">
                    {{$item->roll_no}}
                </th>
                <td class="pl-2 py-4">
                    {{$item->name}}
                </td>
                <td class="pl-2 py-4">
                    {{$item->program}}
                </td>
                <td class="pl-2 py-4">
                    {{$item->semester}}
                </td>
                <td class="pl-2 py-4">
                    {{$item->amount}}
                </td>
                <td class="pl-2 py-4">
                    {{$item->transaction_state}}
                </td>
                <td class="pl-2 py-4">
                    @if(isset($item->receipt_image))
                    <a href="{{url($item->receipt_image)}}">open</a>
                    @else
                    Nil
                    @endif
                </td>
                <td class="pl-2 py-4 text-center">
                    <div class="flex content-center item-center justify-center">
                        <a href="{{url('api/fees/'.$item->id.'/edit')}}" class="mr-2 font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        @if($item->transaction_state == 'unpaid')
                        <a href="{{url('approve_fees/'.$item->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Approve</a>
                        @endif
                        <form method="POST" action="{{route('fees.destroy',$item->id)}}" action="POST">
                            @csrf
                            @method('DELETE')  
                            <button type="submit" class="text-red-700 ml-2">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @if($dataList->isEmpty())
    <div class="flex justify-center py-10">
        No Record Found
    </div>
    @endif
</div>
@endsection