@extends("layouts.layout")
@section("pageTitle")
    Forecast City
@endsection
@section("content")
        <div>Sunrise: {{$sunrise}}</div>
        <div>Sunset: {{$sunset}}</div>
@endsection