@extends('layouts.app')

@section("title")
    Add new Location
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add new Location') }}</div>

                <div class="card-body">
                    @if (Session::has("success"))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif

                    @if (count($errors)>0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <h1>Add New Location</h1>
                    <form action="{{ route('locations.store') }}" method="POST">
                        @csrf

                        <label for="latitude" class="form-label">Latitude</label>
                        <input type="text" name="latitude" class="form-control">

                        <label for="longitude" class="form-label">Longitude</label>
                        <input type="text" name="longitude" class="form-control">

                        <button type="submit" class="btn btn-primary mt-3">Add</button>
                    </form>

                    {{-- <a href="{{ route("locations") }}" class="btn btn-danger mt-3">Return to Your Locations</a> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
