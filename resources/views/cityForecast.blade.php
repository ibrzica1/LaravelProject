@extends("layouts.layout")
@section("pageTitle")
    Forecast City
@endsection
@section("content")
        <div>Sunrise: {{$forecasts->forecast->forecastday[0]->astro->sunrise}}</div>
        <div>Sunset: {{$forecasts->forecast->forecastday[0]->astro->sunset}}</div>
@endsection