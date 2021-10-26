@extends('layouts.app')

@section('title')
    Add new Location
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add new Location') }}</div>

                    <div class="card-body">
                        @include('_include')
                        <h1>Add New Location</h1>
                        <form action="{{ route('locations.store') }}" method="POST">
                            @csrf

                            <label for="latitude" class="form-label">Latitude</label>
                            <input type="text" name="latitude" class="form-control">

                            <label for="longitude" class="form-label">Longitude</label>
                            <input type="text" name="longitude" class="form-control">

                            <button type="submit" class="btn btn-primary mt-3">Add</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
