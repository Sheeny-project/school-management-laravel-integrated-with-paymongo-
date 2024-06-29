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
        @endif
        {{-- @if(session('success'))
            <script>
                toastr.success("<strong>{{ session('success') }}</strong>");
            </script>
        @endif --}}
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <script>
                    toastr.error("{{ $error }}");
                </script>
            @endforeach
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
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">CPU Traffic</span>
                            <span class="info-box-number">
                                10<small>%</small>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Likes</span>
                            <span class="info-box-number">41,410</span>
                        </div>
                    </div>
                </div>

                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Sales</span>
                            <span class="info-box-number">760</span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">New Members</span>
                            <span class="info-box-number">2,000</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header border-transparent">
                   <h3 class="card-title">Course available</h3>
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
                      <table class="table m-0" id="course">
                         <thead>
                            <tr>
                               <th>Course ID</th>
                               <th>Course</th>
                               <th>Description</th>
                            </tr>
                         </thead>
                         <tbody>
                         </tbody>
                      </table>
                   </div>
                </div>
                @include('modal.add_course_modal')
                @include('modal.add_subject_modal')
                <div class="card-footer clearfix">
                    <button type="button" class="btn btn-sm btn-info float-left" onclick="course_modal()">
                        Add course
                      </button>
                </div>
             </div>

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <script src="{{ asset('js/course_modal.js') }}"></script>
    <!-- /.content -->
@endsection
