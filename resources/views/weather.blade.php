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
        @foreach($temperatures as $temperature)
            <tr>
                <th>{{$temperature->city}}</th>
                <td>{{$temperature->temperature}}</td>
                <td>
                <a href="{{route('productDelete',['product' => $product->id])}}" class="btn btn-danger">Delete</a>
                <a href="{{route('changeProductPage',['product' => $product->id])}}" class="btn btn-primary">Edit</a>
            </td>
            </tr>
        @endforeach
    </tbody>
    </table>
@endsection