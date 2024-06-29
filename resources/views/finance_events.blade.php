@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <form action="{{ route('add.event') }}" method="post">
        @csrf
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
                <div class="mb-2">
                    <h1 class="m-0 text-center">{{ __('Add event') }}</h1>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="name" class="form-label">Event name</label>
                            <input
                                type="text"
                                class="form-control @error('name') is-invalid @enderror"
                                name="name"
                                id="name"
                                aria-describedby="nameHelp"
                                placeholder="Battle of the bands"
                                value="{{ old('name') }}"
                            />
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="description" class="form-label">Event description</label>
                            <textarea
                                class="form-control @error('description') is-invalid @enderror"
                                name="description"
                                id="description"
                                rows="3"
                                placeholder="Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, odio."
                            >{{ old('description') }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col">
                        <div class="mb-3">
                            <label for="price" class="form-label">Event price</label>
                            <input
                                type="text"
                                class="form-control @error('price') is-invalid @enderror"
                                name="price"
                                id="price"
                                aria-describedby="priceHelp"
                                placeholder="90"
                                value="{{ old('price') }}"
                            />
                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="date" class="form-label">Event Date</label>
                            <input
                                type="datetime-local"
                                class="form-control @error('date') is-invalid @enderror"
                                name="date"
                                id="date"
                                aria-describedby="dateHelp"
                                value="{{ old('date') }}"
                            />
                            @error('date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <button
                            type="submit"
                            class="btn btn-info btn-sm w-50"
                        >
                            Add event
                        </button>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </form>
@endsection
