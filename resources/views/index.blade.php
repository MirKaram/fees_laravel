@extends('layout.app')
@section('content')
<div class="flex justify-center">
    <div class="grid grid-cols-3  m-auto m-10 gap-6 ">
        <div class="card justify-start items-start">
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
        <div class="row-span-3 card">
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
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline" type="submit">
                        Submit
                    </button>
                </div>
            </form>
        </div>
        <div class="col-span-2 card">
        <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
        </div>
    </div>
</div>

<script src="{{asset('js/chart.js')}}"></script>
<script>
    var xValues = ["Jan", "Feb", "March", "April", "May"];
    var yValues = [120000, 230000, 400000, 550343, 800000];
    var barColors = "orange";

    new Chart("myChart", {
        type: "bar",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            legend: {
                display: false
            },
            title: {
                display: true,
                text: "Fees collection states 2022"
            }
        }
    });
</script>

@endsection