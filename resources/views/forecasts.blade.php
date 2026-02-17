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
            <tr>
                <th>{{$forecast->date}}</th>
                @if($forecast->temperature <= 0)
                    <td style="color:lightBlue">{{$forecast->temperature}}</td>
                @elseif($forecast->temperature > 0 && $forecast->temperature <= 15)
                    <td style="color:blue">{{$forecast->temperature}}</td>
                @elseif($forecast->temperature > 15 && $forecast->temperature <= 25)
                    <td style="color:green">{{$forecast->temperature}}</td>
                @elseif($forecast->temperature > 25)
                    <td style="color:red">{{$forecast->temperature}}</td>
                @endif
            </tr>
            @endforeach
        </tbody>
        </table>

    @endforeach
    
@endsection