<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-gray-100  antialiased leading-none font-sans">

    <div class="flex justify-center ">
        <form class="bg-white p-10 m-10 " method="post" action="/api/fees/{{isset($fees) ? $fees->id : ''}}">
            @csrf
            @method('PUT')
            <!-- @if(isset($fees))
            {{ csrf_field() }}
            {{ method_field("PUT") }}
            @endif -->
            <input type="text" value="web" name="web" hidden>
            <div class="mb-6">
                <label for="rollno" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Student Roll No</label>
                <input readonly value="{{$fees->student_roll_no}}" type="text" name="roll_no" class="bg-gray-50 border border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter name here" required>
            </div>
            <div class="mb-8">
                <label for="student_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Student Name</label>
                <input readonly value="{{$fees->student_name}}" type="text" name="student_name" class="bg-gray-50 border border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>

            <div class="mb-8">
                <label for="program" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Program</label>
                <input readonly value="{{$fees->program}}" type="text" name="program" class="bg-gray-50 border border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>

            <div class="mb-8">
                <label for="semester" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Semester</label>
                <input readonly value="{{$fees->semester}}" type="text" name="semester" class="bg-gray-50 border border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>

            <div class="mb-8">
                <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Date</label>
                <input readonly value="{{ $fees->updated_at  }}" type="date" name="date" class="bg-gray-50 border border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>

            <div class="mb-8">
                <label for="amount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Amount</label>
                <input value="{{ $fees->amount}}" type="number" name="amount" class="bg-gray-50 border border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>
            <div class="mb-8">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Status</label>
                <select name="transaction_state" selec class="bg-gray-50 border border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option "{{ $fees->transaction_state == 'paid' ? 'selected' : ''}}" value="paid">Paid</option>
                    <option "{{ $fees->transaction_state == 'unpain' ? 'selected' : ''}}" value="unpaid">Unpaid</option>
                </select>
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{isset($fees) ? 'Update' : 'Save'}}</button>
        </form>
    </div>

</body>

</html>