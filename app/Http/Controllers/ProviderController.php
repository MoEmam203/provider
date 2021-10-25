<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProviderRequest;
use App\Models\Provider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProviderController extends Controller
{
    public function index(){
        $providers = Provider::paginate(PAGINATE_NUMBER);

        return view("providers.index",compact("providers"));
    }

    public function store(ProviderRequest $request,User $user,Provider $provider){
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $provider->username = $request->username;
        $provider->user_id = $user->id;
        $provider->save();

        return redirect()->back()->with("success","Provider added successfully");
    }
}
