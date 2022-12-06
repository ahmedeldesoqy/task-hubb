<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<body class="antialiased">

    <div class="container">
        <a href="{{ route('orders') }}" class="btn btn-info">Task 2</a>
        <h5>All Medicla Records</h5>
        <div class="col-lg-12">

            <form action="{{ route('search' , $records['page']) }}" method="post">
                @csrf()
                <div class="row">
                    <div class="col-lg-5">

                        <select name="doctor_id" class="form-control">
                            @foreach(collect($records['data'])->unique('doctor.name') as $record)
                            <option value="{{ $record['doctor']['id'] }}">{{ $record['doctor']['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-5">

                        <select name="diagnosis_id" class="form-control">
                            @foreach(collect($records['data'])->unique('diagnosis.id') as $record)
                            <option value="{{ $record['diagnosis']['id'] }}">{{ $record['diagnosis']['id'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-2">

                        <button class="btn btn-info" type="submit"> Search </button>
                    </div>
                </div>
            </form>

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">User Name</th>
                        <th scope="col">User Dob</th>
                        <th scope="col">diagnosis</th>
                        <th scope="col">vitals</th>
                        <th scope="col">doctor</th>
                        <th scope="col">meta</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($records['data'] as $record)
                    <tr>
                        <th scope="row">{{ $record['id'] }}</th>
                        <th scope="row">{{ $record['userName'] }}</th>
                        <th scope="row">{{ $record['userDob'] }}</th>
                        <th scope="row">
                            Id : {{$record['diagnosis']['id']}} <br>
                            Name : {{$record['diagnosis']['name']}} <br>
                            Severity : {{$record['diagnosis']['name']}} <br>
                        </th>
                        <th scope="row">
                            Diastole : {{$record['vitals']['bloodPressureDiastole']}} <br>
                            Systole : {{$record['vitals']['bloodPressureSystole']}} <br>
                            pulse : {{$record['vitals']['pulse']}} <br>
                            breathingRate : {{$record['vitals']['breathingRate']}} <br>
                            bodyTemperature : {{$record['vitals']['bodyTemperature']}} <br>
                        </th>
                        <th scope="row">
                            Id : {{$record['doctor']['id']}} <br>
                            Name : {{$record['doctor']['name']}} <br>
                        </th>
                        <th scope="row">
                            height : {{$record['meta']['height']}} <br>
                            weight : {{$record['meta']['weight']}} <br>
                        </th>
                    </tr>
                    @endforeach

                </tbody>
            </table>

            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    @for($i = 1; $i < $records['total_pages']; $i++) <li class="page-item"><a class="page-link" href="{{ route('pagination' , $i) }}">{{ $i }}</a></li>
                        @endfor
                </ul>
            </nav>

        </div>

    </div>
</body>

</html>