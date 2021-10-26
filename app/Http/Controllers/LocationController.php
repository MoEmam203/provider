<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocationRequest;

class LocationController extends Controller
{
    public function index()
    {
        $provider = auth()->user()->provider;
        $locations = $provider->locations()->get();
        return view('locations.index', compact('locations', 'provider'));
    }

    public function create()
    {
        $provider = auth()->user()->provider;
        $locations_count = $provider->locations()->count();
        if ($locations_count >= 5) {
            return redirect()->back()->with('error', "You have 5 locations , you can't add more");
        }
        return view('locations.create');
    }

    public function store(LocationRequest $request)
    {
        $provider = auth()->user()->provider;
        $provider->locations()->create($request->validated());
        return redirect()->route('locations.index')->with('success', 'Location added successfully');
    }
}
