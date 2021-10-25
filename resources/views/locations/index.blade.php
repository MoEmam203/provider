@extends('layouts.app')

@section("title")
    Your Locations
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Your Locations') }}</div>

                <div class="card-body">
                    @if (Session::has("success"))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif

                    @if (Session::has("error"))
                        <div class="alert alert-danger">
                            {{ session()->get('error') }}
                        </div>
                    @endif

                    <a href="{{ route("locations.create",Auth::user()->provider) }}" class="btn btn-success">Add new location</a>
                    <h1>Your Locations</h1>
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
                                    <td>{{ $location->longitude}}</td>
                                </tr>
                            @empty
                                <p>No Locations Yet , Add New One</p>
                            @endforelse
                        </tbody>
                    </table>

                    {{ $locations->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
