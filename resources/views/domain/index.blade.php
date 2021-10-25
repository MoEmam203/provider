@extends('layouts.app')

@section("title")
    {{ $user->name }} Locations
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $user->name }} Locations</div>
                <div class="card-body">

                    @if (Session::has("error"))
                        <div class="alert alert-danger">
                            {{ session()->get('error') }}
                        </div>
                    @endif
                    
                    <h1>{{ $user->name }} Locations</h1>
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
