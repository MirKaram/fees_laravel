<nav class="bg-white rounded-lg shadow-lg">
        <div class="max-w-6xl mx-auto px-4">
                <div class="flex justify-between">
                        <div class="flex space-x-7">
                                <div>
                                        <!-- Website Logo -->
                                        <a href="{{route('home')}}" class="flex items-center py-4 px-2 no-underline">
                                                <img class="rounded-lg w-10 h-10 mr-2" src="{{asset('storage/paper.gif')}}" alt="Logo" class="h-8 w-8 mr-2">
                                                <span class="font-semibold text-gray-500 text-3xl">FMS</span>
                                        </a>
                                </div>
                                <!-- Primary Navbar items -->
                                <div class=" md:flex items-center space-x-2">
                                        <a href="{{route('home')}}" class="py-4 px-2 text-{{ Request::routeIs('home') ? 'green' : 'gray'}}-500 border-b-4 border-green-500 font-semibold no-underline">Home</a>
                                        <a href="{{route('fees')}}" class="py-4 px-2 text-{{ Request::routeIs('fees') ? 'green' : 'gray'}}-500 font-semibold hover:text-green-500 transition duration-300 no-underline">Fees</a>
                                        <a href="{{route('student')}}" class="py-4 px-2 text-{{ Request::routeIs('student') ? 'green' : 'gray'}}-500 font-semibold hover:text-green-500 transition duration-300 no-underline">Students</a>
                                        <a href="{{route('program')}}" class="py-4 px-2 text-{{ Request::routeIs('program') ? 'green' : 'gray'}}-500 font-semibold hover:text-green-500 transition duration-300 no-underline">Programs</a>
                                        <a href="{{route('about')}}" class="py-4 px-2 text-{{ Request::routeIs('about') ? 'green' : 'gray'}}-500 font-semibold hover:text-green-500 transition duration-300 no-underline">Contact Us</a>
                                </div>
                        </div>
                        <!-- Secondary Navbar items -->
                        <div class=" md:flex items-center space-x-3 ">
                                <a href="{{route('logout')}}" class="py-2 px-2 font-medium text-gray-500 rounded hover:bg-red-300 hover:text-white transition duration-300 no-underline">Logout</a>
                                <!-- <a href="{{route('logout')}}" class="py-2 px-2 font-medium text-white bg-green-500 rounded hover:bg-green-400 transition duration-300">Sign Up</a> -->
                        </div>

                </div>
        </div>

</nav>