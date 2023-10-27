
@extends('layouts.master')
<?php 
        
        $dt = App\Http\Controllers\accountController::monthlyGraph();
        $total = App\Http\Controllers\accountController::totalGraph();
         ?>
         
@section('main')
    <main class="app-content dash">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-dashboard"></i> Dashboard</h1>

            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                    <div class="info">
                        <h4>Total: {{$UmrahCount + $VisaCount}}</h4>
                        <h4>Umrah: <b>{{$UmrahCount}}</b></h4>
                        <h4>Visa : <b>{{$VisaCount}}</b></h4>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="widget-small info coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
                    <div class="info">
                        <h4>Total accounts</h4>
                        <p><b>{{$UmraSales + $VisaSales}}</b></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
                    <div class="info">
                        <h4>Total Expenses</h4>
                        <p><b>{{$UmraExpenses + $VisaExpenses}}</b></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
                    <div class="info">
                        <h4>Total Profit</h4>
                        <p><b>{{($UmraSales + $VisaSales) - ($UmraExpenses + $VisaExpenses)}}</b></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title">Monthly Sales</h3>
                    <div class="embed-responsive embed-responsive-16by9">
                        <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
                    </div>
                </div>
            </div>
            {{-- <div class="col-md-6">
                <div class="tile">
                    <h3 class="tile-title">Support Requests</h3>
                    <div class="embed-responsive embed-responsive-16by9">
                        <canvas class="embed-responsive-item" id="pieChartDemo"></canvas>
                    </div>
                </div>
            </div> --}}
        </div>
        <div class="row text-center d-flex justify-content-center">
            <div class="col-md-10">
                <div class="tile text-left">
                    <h3 class="tile-title">Umrah Sales</h3>    
                    <table class="table table-striped border">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Cus ID</th>
                                <th>Name</th>
                                <th>Visa Price</th>                                
                                <th>Tiket Price</th>
                                <th>Other Expenses</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Umrah as $umrahs)
                                <tr>
                                    <td>{{ $umrahs  ->id }}</td>
                                    <td>{{ $umrahs->CustomerID }}</td>
                                    <td>{{ $umrahs->full_name }}</td>
                                    <td>{{ $umrahs->VisaPrice }}</td>
                                    <td>{{ $umrahs->TiketPrice }}</td>
                                    <td>{{ $umrahs->OtherExpenses }}</td>
                                    <td>{{ $umrahs->Amount }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="3">Total</td>
                                <td>{{$Umrah->sum('VisaPrice')}}</td>
                                <td>{{$Umrah->sum('TiketPrice')}}</td>
                                <td>{{$Umrah->sum('OtherExpenses')}}</td>
                                <td>{{$Umrah->sum('Amount')}}</td>
                            </tr>
                        </tbody>
                    </table>
                    
                    <h3 class="tile-title">Visa Sales</h3>    
                    <table class="table table-striped border">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Cus ID</th>
                                <th>Name</th>
                                <th>Visa Price</th>                                
                                <th>Tiket Price</th>
                                <th>Other Expenses</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Visa as $visa)
                                <tr>
                                    <td>{{ $visa  ->id }}</td>
                                    <td>{{ $visa->CustomerID }}</td>
                                    <td>{{ $visa->full_name }}</td>
                                    <td>{{ $visa->VisaPrice }}</td>
                                    <td>{{ $visa->TiketPrice }}</td>
                                    <td>{{ $visa->OtherExpenses }}</td>
                                    <td>{{ $visa->Amount }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="3">Total</td>
                                <td>{{$Visa->sum('VisaPrice')}}</td>
                                <td>{{$Visa->sum('TiketPrice')}}</td>
                                <td>{{$Visa->sum('OtherExpenses')}}</td>
                                <td>{{$Visa->sum('Amount')}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('pageJs')
<script type="text/javascript" src="{{ asset('admin/js/plugins/chart.js') }}"></script>
<script type="text/javascript">
    
    var total = <?= $total ?> 
    var myData = <?= $dt ?>;
    var months = [];
    var income = [];
    var expense = [];
    for (const [key, value] of Object.entries(myData)) {
        months.push(key);
        income.push(value[0]);
        expense.push(value[1]);
    }
    var data = {
        labels: months,
        datasets: [{
                label: "My First dataset",
                fillColor: "rgba(220,220,220,0.2)",
                strokeColor: "rgba(220,220,220,1)",
                pointColor: "rgba(220,220,220,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: income
            },
            {
                label: "My Second dataset",
                fillColor: "rgba(151,187,205,0.2)",
                strokeColor: "rgba(151,187,205,1)",
                pointColor: "rgba(151,187,205,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: expense
            }
        ]
    };
    var pdata = [{
            value: total[0],
            color: "#46BFBD",
            highlight: "#5AD3D1",
            label: "Total Income"
        },
        {
            value: total[1],
            color: "#F7464A",
            highlight: "#FF5A5E",
            label: "Expenses"
        }
    ]

    var ctxl = $("#lineChartDemo").get(0).getContext("2d");
    var lineChart = new Chart(ctxl).Line(data);

    var ctxp = $("#pieChartDemo").get(0).getContext("2d");
    var pieChart = new Chart(ctxp).Pie(pdata);
</script>
@endsection
