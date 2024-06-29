@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Finance Dashboard') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                           <h5 class="card-title">Monthly Recap Report</h5>
                           <div class="card-tools">
                              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                              <i class="fas fa-minus"></i>
                              </button>
                              <button type="button" class="btn btn-tool" data-card-widget="remove">
                              <i class="fas fa-times"></i>
                              </button>
                           </div>
                        </div>
                        <div class="card-body">
                           <div class="row">
                              <div class="col-md-8">
                                 <p class="text-center">
                                    <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                                 </p>
                                 <div class="chart">
                                    <canvas id="salesChart" height="225" style="height: 180px; display: block; width: 507px;" width="633" class="chartjs-render-monitor"></canvas>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <p class="text-center">
                                    <strong>Goal Completion</strong>
                                 </p>
                                 <div class="progress-group">
                                    Add Products to Cart
                                    <span class="float-right"><b>160</b>/200</span>
                                    <div class="progress progress-sm">
                                       <div class="progress-bar bg-primary" style="width: 80%"></div>
                                    </div>
                                 </div>
                                 <div class="progress-group">
                                    Complete Purchase
                                    <span class="float-right"><b>310</b>/400</span>
                                    <div class="progress progress-sm">
                                       <div class="progress-bar bg-danger" style="width: 75%"></div>
                                    </div>
                                 </div>
                                 <div class="progress-group">
                                    <span class="progress-text">Visit Premium Page</span>
                                    <span class="float-right"><b>480</b>/800</span>
                                    <div class="progress progress-sm">
                                       <div class="progress-bar bg-success" style="width: 60%"></div>
                                    </div>
                                 </div>
                                 <div class="progress-group">
                                    Send Inquiries
                                    <span class="float-right"><b>250</b>/500</span>
                                    <div class="progress progress-sm">
                                       <div class="progress-bar bg-warning" style="width: 50%"></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="card-footer">
                           <div class="row">
                              <div class="col-sm-3 col-6">
                                 <div class="description-block border-right">
                                    <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span>
                                    <h5 class="description-header">$35,210.43</h5>
                                    <span class="description-text">TOTAL REVENUE</span>
                                 </div>
                              </div>
                              <div class="col-sm-3 col-6">
                                 <div class="description-block border-right">
                                    <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 0%</span>
                                    <h5 class="description-header">$10,390.90</h5>
                                    <span class="description-text">TOTAL COST</span>
                                 </div>
                              </div>
                              <div class="col-sm-3 col-6">
                                 <div class="description-block border-right">
                                    <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span>
                                    <h5 class="description-header">$24,813.53</h5>
                                    <span class="description-text">TOTAL PROFIT</span>
                                 </div>
                              </div>
                              <div class="col-sm-3 col-6">
                                 <div class="description-block">
                                    <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span>
                                    <h5 class="description-header">1200</h5>
                                    <span class="description-text">GOAL COMPLETIONS</span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <script>
        // JavaScript to initialize the line chart
        var ctx = document.getElementById('salesChart').getContext('2d');
        var salesChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                    label: 'Sales',
                    data: [12, 19, 3, 5, 2, 3, 15],
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1,
                    fill: false
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <!-- /.content -->
@endsection
