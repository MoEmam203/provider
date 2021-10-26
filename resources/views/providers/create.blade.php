@extends('layouts.app')

@section('title')
    Add new provider
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add new provider') }}</div>

                    <div class="card-body">
                        @include('_include')
                        <h1>Add New Provider</h1>
                        <form action="{{ route('providers.store') }}" method="POST">
                            @csrf

                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control">

                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control">

                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control">

                            <label for="password" class="form-label">Password Confirmation</label>
                            <input type="password" name="password_confirmation" class="form-control">

                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control">

                            <button type="submit" class="btn btn-primary mt-3">Add</button>
                        </form>

                        <a href="{{ route('providers.index') }}" class="btn btn-danger mt-3">Return to all Providers</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
