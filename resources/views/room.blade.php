@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Room') }}</h1>
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
<form action="{{ route('add.room') }}" method="post">
    @csrf
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">{{ __('Add room') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Room Number</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="room_number"
                                            id=""
                                            aria-describedby="helpId"
                                            placeholder=""
                                        />
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Type</label>
                                        <select class="custom-select" id="inputGroupSelect01" name="type">
                                        <option selected>-- Choose --</option>
                                        @foreach ($type as $row)
                                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <button
                                type="submit"
                                class="btn btn-info btn-sm float-right"
                            >
                                Add room
                            </button>
                        </div>
                    </div>

                    <div class="card">
                        <div class="table" id="room-table"></div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    @include('modal.show_section_room_modal')
    <script src="{{ asset('js/room.js') }}"></script>
    <!-- /.content -->
@endsection
</form>
