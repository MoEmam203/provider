@extends('layouts.app')

@section('title')
    Your Locations
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Your Locations') }}</div>
                    <div class="card-body">
                        @include('_include')
                        @if ($locations->count() >= 5)
                            <a href="{{ route('locations.create') }}" class="btn btn-success">Add new location</a>
                        @endif
                        <h1>Your Locations {{ $locations->count() }}</h1>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Latitude</th>
                                    <th scope="col">Longitude</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($locations as $location)
                                    <tr>
                                        <th scope="row">{{ $location->id }}</th>
                                        <td>{{ $location->latitude }}</td>
                                        <td>{{ $location->longitude }}</td>
                                    </tr>
                                @empty
                                    <p>No Locations Yet , Add New One</p>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
