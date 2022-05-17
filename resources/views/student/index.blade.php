@extends('layout.app')
@section('content')
<div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-10">
    <div class="flex p-2">
        <a href="{{url('api/student/create')}}" class="button">Add New</a>
    </div>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Roll No
                </th>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Degree
                </th>
                <th scope="col" class="px-6 py-3">
                    Semester
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($dataList as $item)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4">
                    {{$item->roll_no}}
                </th>
                <td class="px-6 py-4">
                    {{$item->name}}
                </td>
                <td class="px-6 py-4">
                    {{$item->program}}
                </td>
                <td class="px-6 py-4">
                    {{$item->current_semester}}
                </td>
                <td class="px-6 py-4 text-right">
                    <a href="{{url('api/student/'.$item->id.'/edit')}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
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