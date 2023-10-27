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
           <div> <h1><i class="fa fa-dashboard"></i> Monthly Income</h1></div>
        </div>
        <div class="row">
        <div class="col-md-1"> 
            
          <a class="btn btn-info"> Jan</i></a>
        </div>
        <div class="col-md-1 "> 
            
            <a class="btn btn-success"> Feb</a>
         </div>
         <div class="col-md-1 "> 
            
            <a class="btn btn-primary"> Mar</a>
         </div>
         <div class="col-md-1 "> 
            
            <a class="btn btn-secondary"> Apr</a>
         </div>
         <div class="col-md-1 "> 
            
            <a class="btn btn-warning"> May</a>
         </div>
         <div class="col-md-1 "> 
            
            <a class="btn btn-light"> Jun</a>
         </div>
         <div class="col-md-1 "> 
            
            <a class="btn btn-danger"> Jul</a>
         </div>
         <div class="col-md-1 "> 
            
            <a class="btn btn-primary"> Aug</a>
         </div>
         <div class="col-md-1 "> 
            
            <a class="btn btn-warning"> Sept</a>
         </div>
         <div class="col-md-1 "> 
            
            <a class="btn btn-info"> Oct</a>
         </div>
         <div class="col-md-1 "> 
            
            <a class="btn btn-danger"> Nov</a>
         </div>
         <div class="col-md-1 "> 
            
            <a class="btn btn-success"> Dec</a>
         </div>
        </div>

       <br/>
        <div class="row">
            <div class="col-md-6">
                <div class="tile">
                    <h3 class="tile-title">Monthly Sales Table</h3>
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

                      
                        
                        </tbody>
                        
                        </table>
                </div>
            </div>
            <div class="col-md-6">
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
    <script type="text/javascript">

    </script>
@endsection