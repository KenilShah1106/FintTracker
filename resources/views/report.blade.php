<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>MoneyWiz Report</title>

    <link rel="stylesheet" href="{{public_path('css/app.css')}}">
    <link rel="stylesheet" href="{{public_path('assets/frontend/css/app.css')}}">
    <link rel="stylesheet" href="{{public_path('assets/frontend/css/custom/app.css')}}">

</head>
<body>
    <div class="w-100 text-center">
        <img src="{{public_path("assets/img/logos/moneywiz-logo-1.png")}}" class="navbar-brand-img img-responsive" alt="main_logo" width="45%">
        <h1>MoneyWiz Report</h1>

    </div>
    {{-- <div class="w-100 text-center">
        <h2>Transaction Types</h2>
        @php
            $types = ["UPI", "Bank_transfer", "Cash"]
        @endphp
        <table class="table table-bordered">
            <thead class="table-dark">
                <th>Types</th>
                <th>Percentage</th>
            </thead>
            <tbody>
                @foreach($transactionTypeStats as $t)
                    <tr>
                        <td>{{ $types[$loop->index] }}</td>
                        <td>{{ $t }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> --}}
    <div class="w-100 text-center">
        @foreach($paths as $path)
            <div class="w-100">
                <img src="{{ $path }}" alt="Image">
            </div>
        @endforeach
    </div>
</body>
</html>
