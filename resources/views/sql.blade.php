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

        <h5>Orders</h5>
        <div class="col-lg-12">

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Date</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Total</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <th scope="row">{{ $order->id }}</th>
                        <th scope="row">{{ $order->order_date }}</th>
                        <th scope="row">{{ $order->customer->name }}</th>
                        <th scope="row">
                            @php
                            $total = 0;
                            @endphp
                            @foreach($order->order_details as $details)
                            @php
                            $total += $details->price * $details->qty;
                            @endphp

                            @endforeach

                            {{$total}}

                        </th>
                    </tr>
                    @endforeach

                </tbody>
            </table>

        </div>

    </div>
</body>

</html>