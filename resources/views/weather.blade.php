@extends("layouts.layout")
@section("pageTitle")
    Weather
@endsection
@section("content")
    <a href="{{route('weather.add.page')}}">Add Weather</a>
    @foreach($temperatures as $temperature)
        <p>{{$temperature->city}}: {{$temperature->temperature}} C</p>
    @endforeach
@endsection