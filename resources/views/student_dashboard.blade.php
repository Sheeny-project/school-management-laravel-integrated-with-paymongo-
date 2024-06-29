@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
        @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
            });
        </script>
        @elseif (session('failed'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('failed') }}',
            });
        </script>
         @endif
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Dashboard') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-6">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Outstanding balance</span>
                            <span class="info-box-number">
                                10<small>₱</small>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-6">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Ongoing events</span>
                            <span class="info-box-number">{{ $ongoingEvents }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Grades</h5>
                            <!-- Card header content -->
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <p class="text-center">
                                        <strong>Prelim term</strong>
                                    </p>
                                    <!-- Canvas for the line chart -->
                                    <canvas id="salesChart" height="125"></canvas>
                                </div>
                                <div class="col-md-4">
                                    <p class="text-center mb-3">
                                        <strong>Upcomming event</strong>
                                    </p>
                                    <div class="row event-container">
                                    {{-- <a class="info-box mb-3 bg-success" style="cursor: pointer">
                                        <span class="info-box-icon"><i class="fas fa-tag"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text  ">Students</span>
                                            <span class="info-box-number">5,200</span>
                                        </div>
                                    </a> --}}
                                    </div>
                                </div>
                                <!-- Other content in the card body -->
                            </div>

                        </div>
                        <!-- Card footer content -->
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">{{auth::user()->join_course->name}}</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table m-0" id="subject-cont">
                                    <thead>
                                        <tr>
                                            <th>Subject Code</th>
                                            <th>Subject name</th>
                                            <th>Units</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="card-footer clearfix">
                            <a href="javascript:void(0)" class="btn btn-sm btn-info float-left" onclick="enrollSubject()">Enroll subjects</a>
                            <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
                        </div>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Notification</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body p-0">
                            <ul class="products-list product-list-in-card pl-2 pr-2">
                                <li class="item">
                                    <div class="product-info">

                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="card-footer text-center">
                            <a href="javascript:void(0)" class="uppercase">View All</a>
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
    @include('modal.avail_event_modal')
    @include('modal.enroll_subject_modal')
    <script src="{{ asset('js/student_dashboard.js') }}"></script>
@endsection
