<html lang="en">

<head>
    <title>PDF</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body{
            margin: auto;
            padding: 10px;
        }
        table{
            width: 100%;
            border-collapse: collapse;
        }
        td, th{
            border: 1px solid #555;
            text-align: center;
            padding: 3px;
        }
        h3{
            text-align: center;
        }
    </style>
</head>

<body>
    <h3>Monthly Income</h3>
    <table>
        <thead>
            <tr>
                <th>SL No</th>
                <th>Applicant Name</th>
                <th>Amount</th>
                <th>User</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($monthlyIncome as $month)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $month->applicant_name }}</td>
                    <td>{{ $month->amount }}</td>
                    <td>{{ $month->user->name }}</td>
                    <td>{{ $month->status }}</td>
                </tr>
            @endForeach
        </tbody>
    </table>
</body>

</html>
