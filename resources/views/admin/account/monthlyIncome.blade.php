@extends('layouts.master')

@section('main')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-dashboard"></i> Monthly Income</h1>

            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            </ul>
        </div>
        <div class="row">
            <div>
                <h1><i class="fa fa-dashboard"></i> Monthly Income</h1>
            </div>
        </div>
        <div class="row">
            @php
                $months = ['01' => 'Jan', '02' => 'Feb', '03' => 'Mar', '04' => 'Apr', '05' => 'May', '06' => 'Jun', '07' => 'Jul', '08' => 'Aug', '09' => 'Sep', '10' => 'Oct', '11' => 'Nov', '12' => 'Dec'];
                $colors = ['success', 'primary', 'secondary', 'warning', 'danger', 'info'];
            @endphp

            @foreach ($months as $key => $val)
                @php
                if($loop->iteration<=6){
                    $index = $loop->iteration - 1;
                }else{
                    $index=12-$loop->iteration;
                }
                @endphp
                <div class="col-md-1">
                    <a class="btn btn-{{ $colors[$index] }}"
                        href="{{ route('all.monthlyIncome', $key) }}">{{ $val }}</i></a>
                </div>
            @endforeach

            {{-- <div class="col-md-1 ">

                <a class="btn btn-success" href="{{ route('all.monthlyIncome', '02') }}"> Feb</a>
            </div>
            <div class="col-md-1 ">

                <a class="btn btn-primary" href="{{ route('all.monthlyIncome', '03') }}"> Mar</a>
            </div>
            <div class="col-md-1 ">

                <a class="btn btn-secondary" href="{{ route('all.monthlyIncome', '04') }}"> Apr</a>
            </div>
            <div class="col-md-1 ">

                <a class="btn btn-warning" href="{{ route('all.monthlyIncome', '05') }}"> May</a>
            </div>
            <div class="col-md-1 ">

                <a class="btn btn-light" href="{{ route('all.monthlyIncome', '06') }}"> Jun</a>
            </div>
            <div class="col-md-1 ">

                <a class="btn btn-danger" href="{{ route('all.monthlyIncome', '07') }}"> Jul</a>
            </div>
            <div class="col-md-1 ">

                <a class="btn btn-primary" href="{{ route('all.monthlyIncome', '08') }}"> Aug</a>
            </div>
            <div class="col-md-1 ">

                <a class="btn btn-warning" href="{{ route('all.monthlyIncome', '09') }}"> Sept</a>
            </div>
            <div class="col-md-1 ">

                <a class="btn btn-info" href="{{ route('all.monthlyIncome', '10') }}"> Oct</a>
            </div>
            <div class="col-md-1 ">

                <a class="btn btn-danger" href="{{ route('all.monthlyIncome', '11') }}"> Nov</a>
            </div>
            <div class="col-md-1 ">

                <a class="btn btn-success" href="{{ route('all.monthlyIncome', '12') }}"> Dec</a>
            </div> --}}
        </div>

        <br />
        <div class="row">
            <div class="col-md-7">
                <div class="tile">
                    <div class="row">
                        <div class="col-md-9">
                            <h3 class="tile-title">Monthly Sales Table</h3>
                        </div>
                        <div class="col-md-3"><a href="{{ route('downloadPdf.all', $month) }}"
                                class=" btn btn-info">download
                                pdf</a></div>
                    </div>
                    <table class="table data-table">
                        <thead>
                            <tr>
                                <th scope="col">SL No</th>
                                <th scope="col">Applicant Name</th>
                                <th scope="col">Amount</th>
                                <th scope="col">User</th>
                                <th scope="col">Status</th>
                                <th scope="col">action</th>
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
                                    <td>

                                        <a href="" class="btn btn-sm btn-info" data-toggle="tooltip"
                                            data-placement="top" title="" data-original-title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="" class="btn btn-sm btn-danger" data-toggle="tooltip"
                                            data-placement="top" title="" data-original-title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </a>

                                    </td>
                                </tr>
                            @endForeach




                        </tbody>

                    </table>
                </div>
            </div>
            <div class="col-md-5">
                <div class="tile">
                    <h3 class="tile-title">Monthly Sales</h3>
                    <div class="embed-responsive embed-responsive-16by9">
                        <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
@endsection

@section('pageJs')
    <script type="text/javascript" src="{{ asset('admin/js/plugins/chart.js') }}"></script>
    <script type="text/javascript">
        var data = {
            labels: ["January", "February", "March", "April", "May"],
            datasets: [{
                    label: "My First dataset",
                    fillColor: "rgba(220,220,220,0.2)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [65, 59, 80, 81, 56]
                },
                {
                    label: "My Second dataset",
                    fillColor: "rgba(151,187,205,0.2)",
                    strokeColor: "rgba(151,187,205,1)",
                    pointColor: "rgba(151,187,205,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(151,187,205,1)",
                    data: [28, 48, 40, 19, 86]
                }
            ]
        };
        var pdata = [{
                value: 300,
                color: "#46BFBD",
                highlight: "#5AD3D1",
                label: "Complete"
            },
            {
                value: 50,
                color: "#F7464A",
                highlight: "#FF5A5E",
                label: "In-Progress"
            }
        ]

        var ctxl = $("#lineChartDemo").get(0).getContext("2d");
        var lineChart = new Chart(ctxl).Line(data);

        var ctxp = $("#pieChartDemo").get(0).getContext("2d");
        var pieChart = new Chart(ctxp).Pie(pdata);
    </script>
@endsection
@section('pageJs')
    <script type="text/javascript"></script>
@endsection
