@extends("layouts.layout")
@section("pageTitle")
    Forecast Search
@endsection
@section("content")
   @if(session()->has('error'))
        <p>{{session('error')}}</p>
    @endif
    
   @foreach($cities as $city)
   
   <div class="bg-light d-flex align-items-center p-2 align-text-middle">
        <a href="{{route('user-cities.favorite', ['city'=>$city->id])}}" class="btn btn-success" style="margin-right: 10px;">
            <i class="fa-regular fa-heart"></i>
        </a>
        
        <img src="{{ asset('images/' . $city->todayForecast->weather_type . '.png') }}" width="35" style="margin-right: 10px;">
        <p>{{$city->name}}</p>
   </div>
   @endforeach

@endsection