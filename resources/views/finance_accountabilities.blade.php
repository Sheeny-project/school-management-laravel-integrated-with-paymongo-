@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Accountabilities') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div
                class="card py-4 px-3"
            >
            <div class="row">
                <div class="col-lg-12">
                    <form class="d-flex">
                        <div class="col-6"></div>
                        <div class="col-6">
                            <div class="mb-3">
                                <input
                                    type="text"
                                    name=""
                                    id=""
                                    oninput="search(value)"
                                    class="form-control"
                                    placeholder="Search"
                                    aria-describedby="helpId"
                                />
                            </div>
                        </div>
                    </form>

                    <div id="user-table"></div>
                </div>
            </div>
            </div>

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    <script src="{{ asset('js/accountability.js') }}"></script>
@endsection
