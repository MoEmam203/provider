@extends('layouts.app')

@section("title")
    All Providers
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('All Providers') }}</div>

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

                    <a href="{{ route("providers.create") }}" class="btn btn-success">Add new Provider</a>
                    <h1>All Providers</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Username</th>
                                <th scope="col">Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($providers as $provider)
                                <tr>
                                    <th scope="row" class="text-danger">{{ $provider->id }}</th>
                                    <td>{{ $provider->user->name }}</td>
                                    <td>{{ $provider->user->email }}</td>
                                    <td>{{ $provider->username}}</td>
                                    <td>
                                        <a href="" class="btn btn-primary">View</a>
                                    </td>
                                </tr>
                            @empty
                                <p>No Providers Yet , Add New One</p>
                            @endforelse
                            
                            
                        </tbody>
                    </table>

                    {{ $providers->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
