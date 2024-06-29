@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __($allDetails->get_course->name) }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    @if(session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: '{{ session('success') }}',
                });
            </script>
        @endif
        @if(session('error'))
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: '{{ session('error') }}',
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
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col"></div>
                                <div class="col">
                                    <div class="mb-3">
                                        <input
                                            type="text"
                                            class="form-control"
                                            name=""
                                            id=""
                                            aria-describedby="helpId"
                                            placeholder="Search"
                                            oninput="search(value)"
                                        />
                                    </div>

                                </div>
                            </div>
                            <div class="subject-table"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    @include('modal.add_section_modal')
    @include('modal.show_section_modal')
    <script src="{{ asset('js/subject.js') }}"></script>
    <script>
        $(document).ready(function() {
            showSubject('{{ $courseId  }}');
        });
    </script>
    <!-- /.content -->
@endsection
