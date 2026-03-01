@extends("layouts.layout")
@section("pageTitle")
    Forecast Search
@endsection
@section("content")
   
    <form action="{{route('forecasts.search')}}" method="GET" class="col-10 col-md-8 col-lg-6 p-4 mb-3">
    @if(session()->has('error'))
        <p>{{session('error')}}</p>
    @endif
    @csrf
    <div class="mb-3">
        <label class="form-label">Search your city</label>
        <input type="text" class="form-control" name="city">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    @foreach($favoriteForecasts as $forecast)
        <div class="container d-flex gap-3 mb-2">
            <p>{{$forecast->city->name}}</p>
            <img src="{{ asset('images/' . $forecast->weather_type . '.png') }}" width="30">
            <p>{{$forecast->temperature}}</p>
        </div>
    @endforeach

@endsection