@extends('layout.app')
@section('content')
<div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-10">
    <div class="flex p-2">
        <a href="{{url('api/program/create')}}" class="button">Add New</a>
    </div>

    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="pl-3 py-3">
                    Program name
                </th>
                <th scope="col" class="pl-3 py-3">
                    Semesters
                </th>
                <th scope="col" class="pl-3 py-3">
                    Payment Status
                </th>
                <th scope="col" class="pl-3 py-3">
                    Semester Fee
                </th>
                <th scope="col" class="pl-3 py-3">
                    Admission Fee
                </th>
                <th scope="col" class="pl-3 py-3">
                    Lab Fee
                </th>
                <th scope="col" class="pl-3 py-3">
                    Late Fee
                </th>
                <th scope="col" class="pl-3 py-3">
                    Late Date
                </th>
                <th scope="col" class="pl-3 py-3">
                    Dated
                </th>
                <th scope="col" class="py-3 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($dataList as $item)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4">
                    {{$item->name}}
                </th>
                <td class="pl-2 py-4">
                    {{$item->total_semesters}}
                </td>
                <td class="pl-2 py-4">
                    {{$item->payment_active == 1 ? 'Active' : 'Closed'}}
                </td>
                <td class="pl-2 py-4">
                    {{$item->semester_fee}}
                </td>
                <td class="pl-2 py-4">
                    {{$item->admission_fee}}
                </td>
                <td class="pl-2 py-4">
                    {{$item->Lab_fee}}
                </td>
                <td class="pl-2 py-4">
                    {{$item->late_fee}}
                </td>
                <td class="pl-2 py-4">
                    {{$item->late_date}}
                </td>
                <td class="pl-2 py-4">
                    {{explode(" ",$item->created_at)[0]}}
                </td>
                <td class="px-2 py-4 text-center">
                    <div class="flex content-center item-center justify-center">
                        <a href="{{url('api/program/'.$item->id.'/edit')}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        <form method="POST" action="{{route('program.destroy',$item->id)}}" action="POST">
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