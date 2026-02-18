@extends("layouts.admin")
@section("pageTitle")
    Forecasts
@endsection
@section("content")
    <a  href="{{route('forecasts.add.page')}}" class="btn btn-primary btn-lg">Add Forecasts</a>
    <div class="container mt-4">
    <div class="row g-4">

        @foreach($cities as $city)

        <div class="col-12 col-md-6 col-lg-4">
            <div class="card shadow-sm h-100">

                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">{{ $city->name }}</h5>
                </div>

                <div class="card-body p-0">
                    <table class="table table-striped mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Date</th>
                                <th>Temperature</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($city->forecasts as $forecast)
                            <tr>
                                <td>{{ $forecast->date }}</td>
                                <td>{{ $forecast->temperature }}°C</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        @endforeach

    </div>
</div>

    
@endsection