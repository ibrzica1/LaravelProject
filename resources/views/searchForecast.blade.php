@extends("layouts.layout")
@section("pageTitle")
    Forecast Search
@endsection
@section("content")
   
   @foreach($cities as $city)

    <p>{{$city->name}}</p>

   @endforeach

@endsection