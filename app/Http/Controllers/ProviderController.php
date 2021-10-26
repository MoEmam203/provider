<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProviderRequest;
use App\Models\Provider;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProviderController extends Controller
{
    public function index()
    {
        $providers = Provider::with('user')->paginate();
        return view('providers.index', compact('providers'));
    }

    public function create()
    {
        return view('providers.create');
    }

    public function store(ProviderRequest $request)
    {
        $user = User::create($request->safe()->only(['name', 'email']) + ['password' => Hash::make($request->password)]);
        $user->provider()->create($request->safe()->only(['username']));

        return redirect()->back()->with('success', 'Provider added successfully');
    }
}
