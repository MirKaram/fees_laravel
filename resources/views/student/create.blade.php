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
        <form class="bg-white p-10 m-10 " method="POST" action="/api/student/{{isset($student) ? $student->id : ''}}">
            @csrf
            @if(isset($student))
             {{ csrf_field() }}
             {{ method_field("PUT") }}
            @endif
            <div class="mb-6">
                <label for="rollno" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Student Roll No</label>
                <input value="{{isset($student) ? $student->roll_no : '' }}" type="text" name="roll_no" class="bg-gray-50 border border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter name here" required>
            </div>
            <div class="mb-8">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Student Name</label>
                <input  value="{{isset($student) ? $student->name : '' }}" type="text" name="name" class="bg-gray-50 border border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>

            <div class="mb-8">
                <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Gender</label>
                <select name="gender"  selec class="bg-gray-50 border border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option "{{isset($student) ? $student->gender == 'Male' ? 'selected' : '' : ''}}" value="Male">Male</option>
                    <option "{{isset($student) ? $student->gender == 'Female' ? 'selected' : ''  : ''}}" value="Female">Female</option>
                </select>
            </div>

            <div class="mb-8">
                <label for="dob" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Date of birth</label>
                <input value="{{isset($student) ? $student->dob : '' }}" type="date" name="dob" class="bg-gray-50 border border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>

            <div class="mb-8">
                <label for="program_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Select Program</label>
                <select name="program_id" class="bg-gray-50 border border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach($programs as $item)
                    <option "{{isset($student) ? $student->program_id ==  $item ? 'selected' : '' : ''}}" value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
                <!-- <input type="text" name="program" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required> -->
            </div>

            <div class="mb-8">
                <label for="current_semester" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Semester</label>
                <input value="{{isset($student) ? $student->current_semester : '0' }}" type="number"  name="current_semester" class="bg-gray-50 border border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>

            <div class="mb-8">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Account Password</label>
                <input value="{{isset($student) ? $student->password : substr(str_shuffle('123456789'),0,6) }}" type="text"  name="password" class="bg-gray-50 border border-gray-00 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{isset($student) ? 'Update' : 'Save'}}</button>
        </form>
    </div>

</body>

</html>