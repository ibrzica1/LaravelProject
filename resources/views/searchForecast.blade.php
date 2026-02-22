@extends("layouts.layout")
@section("pageTitle")
    Forecast Search
@endsection
@section("content")
   
   @foreach($cities as $city)
   <div style="display: flex;">
        <img src="{{ asset('images/' . $city->todayForecast->weather_type . '.png') }}" width="35">
        <p>{{$city->name}}</p>
   </div>
   @endforeach

@endsection