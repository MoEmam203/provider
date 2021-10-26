@extends('layouts.app')

@section('title')
    {{ $provider->user->name }} Locations
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $provider->user->name }} Locations</div>
                    <div class="card-body">

                        @include('_include')

                        <h1>{{ $provider->user->name }} Locations</h1>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Latitude</th>
                                    <th scope="col">Longitude</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($provider->locations as $location)
                                    <tr>
                                        <th scope="row">{{ $location->id }}</th>
                                        <td>{{ $location->latitude }}</td>
                                        <td>{{ $location->longitude }}</td>
                                    </tr>
                                @empty
                                    <p>No Locations Yet for this user</p>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
