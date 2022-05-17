<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-gray-100  antialiased leading-none font-sans">

    <div class="flex justify-center ">
        <form class="bg-white p-10 m-10 " method="POST" action="/api/program/{{isset($program) ? $program->id : ''}}">
            @csrf
            @if(isset($program))
            {{ csrf_field() }}
            {{ method_field("PUT") }}
            @endif
            <div class="mb-6">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Program Name</label>
                <input value="{{isset($program) ? $program->name : '' }}" type="text" name="name" class="bg-gray-50 border border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter name here" required>
            </div>
            <div class="mb-8">
                <label for="total_semesters" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Total Semesters</label>
                <input value="{{isset($program) ? $program->total_semesters : '8' }}" type="number" name="total_semesters" class="bg-gray-50 border border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>

            <div class="mb-8">
                <label for="semester_fee" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Semester Fee</label>
                <input value="{{isset($program) ? $program->semester_fee : '0' }}" type="number" name="semester_fee" class="bg-gray-50 border border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>

            <div class="mb-8">
                <label for="admission_fee" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Admission Fee</label>
                <input value="{{isset($program) ? $program->admission_fee : '0' }}" type="number" name="admission_fee" class="bg-gray-50 border border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>

            <div class="mb-8">
                <label for="Lab_fee" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Lab Fee</label>
                <input value="{{isset($program) ? $program->Lab_fee : '0' }}" type="number" name="Lab_fee" class="bg-gray-50 border border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>
            <div class="mb-8">
                <label for="late_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Last Payment Date</label>
                <input value="{{isset($program) ? $program->late_date : '' }}" type="date" name="late_date" class="bg-gray-50 border border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>
            <div class="mb-8">
                <label for="late_fee" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Late Fee</label>
                <input value="{{isset($program) ? $program->late_fee : '0' }}" type="number" name="late_fee" class="bg-gray-50 border border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>

            <input hidden type="number" value="1" name="payment_active">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{isset($program) ? 'Update' : 'Save'}}</button>
        </form>
    </div>

</body>
</html>