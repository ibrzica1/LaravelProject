@extends("layouts.layout")
@section("pageTitle")
    Weather
@endsection
@section("content")
<h3>Weather forecast for {{$selectedCity['city']}}</h3>
    <table class="table table-striped ">
    <thead>
        <tr>
        <th scope="col">City</th>
        <th scope="col">Monday</th>
        <th scope="col">Tuesday</th>
        <th scope="col">Wednesday</th>
        <th scope="col">Thursday</th>
        <th scope="col">Friday</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>{{$selectedCity['city']}}</th>
            <td>{{$selectedCity['monday']}}</td>
            <td>{{$selectedCity['tuesday']}}</td>
            <td>{{$selectedCity['wednesday']}}</td>
            <td>{{$selectedCity['thursday']}}</td>
            <td>{{$selectedCity['friday']}}</td>
        </tr>
    </tbody>
    </table>
@endsection