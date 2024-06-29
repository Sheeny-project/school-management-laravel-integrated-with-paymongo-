@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header text-center">
        <h1 class="m-0">{{ __('Application form') }}</h1>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <form action="{{ route('add.student') }}" method="post">
        @if(session('success'))
            <script>
                toastr.success("<strong>{{ session('success') }}</strong>");
                </script>
        @endif
        @csrf
        <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <h4 class="m-3 text-center text-success">{{ __('Personal Information') }}</h4>
                        <div class="row mx-5">
                            <div class="col-8">
                                <div class="mb-3">
                                    <label for="" class="form-label">Name</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="name"
                                        id=""
                                        aria-describedby="helpId"
                                        placeholder=""
                                    />
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="" class="form-label">Gender</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="gender"
                                        id=""
                                        aria-describedby="helpId"
                                        placeholder=""
                                    />
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="" class="form-label">Age</label>
                                    <input
                                        type="number"
                                        class="form-control"
                                        name="age"
                                        id=""
                                        aria-describedby="helpId"
                                        placeholder=""
                                    />
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="mb-3">
                                    <label for="" class="form-label">Contact No.</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text">+63</div>
                                        </div>
                                        <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="9123456789" name="contact_no">
                                    </div>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="mb-3">
                                    <label for="" class="form-label">Address</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="address"
                                        id=""
                                        aria-describedby="helpId"
                                        placeholder=""
                                    />
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="exampleFormControlSelect1">Example select</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="course_id">
                                        @foreach ($course as $row)
                                        <option selected hidden> -- Select course -- </option>
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                        </select>
                                </div>

                            </div>
                        </div>
                        <h4 class="m-3 text-center text-success">{{ __('Parents/Guardian Information') }}</h4>
                        <div class="row mx-5">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Mothers Name</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="mother_name"
                                        id=""
                                        aria-describedby="helpId"
                                        placeholder=""
                                    />
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="" class="form-label">Contact No.</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text">+63</div>
                                        </div>
                                        <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="9123456789" name="mother_contact">
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="mb-3">
                                    <label for="" class="form-label">Age</label>
                                    <input
                                        type="number"
                                        class="form-control"
                                        name="mother_age"
                                        id=""
                                        aria-describedby="helpId"
                                        placeholder=""
                                    />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Fathers Name</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="father_name"
                                        id=""
                                        aria-describedby="helpId"
                                        placeholder=""
                                    />
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="" class="form-label">Contact No.</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text">+63</div>
                                        </div>
                                        <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="9123456789" name="father_contact">
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="mb-3">
                                    <label for="" class="form-label">Age</label>
                                    <input
                                        type="number"
                                        class="form-control"
                                        name="father_age"
                                        id=""
                                        aria-describedby="helpId"
                                        placeholder=""
                                    />
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col text-center">
                    <button
                        type="submit"
                        class="btn btn-success"
                    >
                        Submit Application
                    </button>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </form>
    <!-- /.content -->
@endsection
