@extends("layouts.layout")
@section("pageTitle")
    Weather
@endsection
@section("content")
<h3>Weather forecast for {{$selectedCity->name}}</h3>
    <table class="table table-striped ">
    <thead>
        <tr>
        <th scope="col">Date</th>
        <th scope="col">Temperature</th>
        </tr>
    </thead>
    <tbody>
        @foreach($selectedCity->forecasts as $forecast)
            <tr>
                <th>{{$forecast['date']}}</th>
                <td>{{$forecast['temperature']}}</td>
            </tr>
        @endforeach
    </tbody>
    </table>
@endsection