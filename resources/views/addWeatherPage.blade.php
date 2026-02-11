@extends("layouts.layout")
@section("pageTitle")
    Add Weather
@endsection
@section("content")
    
    <form action="{{route('weather.add')}}" method="POST" class="col-10 col-md-8 col-lg-6 p-4 mb-3">
    @if($errors->any())
        <p>Error: {{$errors->first()}}</p>
    @endif
    @csrf
    <h3>Add New Weather</h3>
    <div class="mb-3">
        <label class="form-label">City</label>
        <input type="text" class="form-control" name="city" value="{{old('city')}}">
    </div>
    <div class="mb-3">
        <label class="form-label">Temperature</label>
        <input type="number" class="form-control" name="temperature" value="{{old('temperature')}}">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection