@extends("layouts.layout")
@section("pageTitle")
    Add Forecast
@endsection
@section("content")
    
    <form action="{{route('forecasts.add')}}" method="POST" class="col-10 col-md-8 col-lg-6 p-4 mb-3">
    @if($errors->any())
        <p>Error: {{$errors->first()}}</p>
    @endif
    @csrf
    <h3>Add New Forecast</h3>
    <div class="mb-3">
        <label class="form-label">City</label>
        <select name="city_id" class="form-select" aria-label="Default select example">
            <option selected>Open this select menu</option>
            @foreach($cities as $city)
                <option value="{{$city->id}}">{{$city->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Temperature</label>
        <input type="number" class="form-control" name="temperature" value="{{old('temperature')}}">
    </div>
    <div class="mb-3">
        <label class="form-label">Type</label>
        <select name="weather_type" class="form-select" aria-label="Default select example">
            @foreach($weatherTypes as $type )
            <option value="{{$type}}">{{$type}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Probability</label>
        <input type="number" class="form-control" name="probability" value="{{old('probability')}}">
    </div>
    <div class="mb-3">
        <label class="form-label">Probability</label>
        <input type="date" class="form-control" name="date">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection