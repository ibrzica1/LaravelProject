@extends("layouts.layout")
@section("pageTitle")
    Forecasts
@endsection
@section("content")
    <a  href="{{route('forecasts.add.page')}}" class="btn btn-primary btn-lg">Add Forecasts</a>

    @foreach($cities as $city)

        <h4>{{$city->name}}</h4>
        <table class="table table-striped ">
        <thead>
            <tr>
            <th scope="col">Date</th>
            <th scope="col">Temperature</th>
            </tr>
        </thead>
        <tbody>
            @foreach($city->forecasts as $forecast)
            @php
                $color = \App\Http\ForecastHelper::getColorByTemperature($forecast->temperature);
            @endphp
            
            <tr>
                <th>{{$forecast->date}}</th>
                <td>{{$forecast->temperature}}</td>
            </tr>
            @endforeach
        </tbody>
        </table>

    @endforeach
    
@endsection