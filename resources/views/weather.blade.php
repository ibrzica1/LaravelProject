@extends("layouts.layout")
@section("pageTitle")
    Weather
@endsection
@section("content")
    <a  href="{{route('weather.add.page')}}" class="btn btn-primary btn-lg">Add Weather</a>
    
    <table class="table table-striped ">
    <thead>
        <tr>
        <th scope="col">City</th>
        <th scope="col">Temperature</th>
        <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($weathers as $weather)
            <tr>
                <th>{{$weather->city}}</th>
                <td>{{$weather->temperature}}</td>
                <td>
                    <a href="{{route('weather.delete',['weather' => $weather->id])}}" class="btn btn-danger">Delete</a>
                    <a href="{{route('edit.weather.page',['weather' => $weather->id])}}" class="btn btn-primary">Edit</a>
                </td>
            </tr>
        @endforeach
    </tbody>
    </table>
@endsection