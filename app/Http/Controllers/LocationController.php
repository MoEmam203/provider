<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocationRequest;
use App\Models\Location;
use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LocationController extends Controller
{
    public function index(Provider $provider){
        $locations = Location::where('provider_id',$provider->id)->paginate(PAGINATE_NUMBER);

        return view("locations.index",compact('locations'));
    }

    public function create(Provider $provider){
        $locations = Location::where('provider_id',$provider->id)->get();

        // return count($locations);
        if(count($locations) >= 5){
            return redirect()->back()->with("error","You have 5 locations , you can't add more");
        }
        return view("locations.create");
    }

    public function store(LocationRequest $request , Location $location){
        $location->latitude = $request->latitude;
        $location->longitude = $request->longitude;
        $location->provider_id = Auth::user()->provider->id;
        $location->save();

        return redirect()->route("locations",Auth::user()->provider)->with("success","Location added successfully");
    }
}
