<?php

namespace App\Http\Controllers;

use App\Models\Provider;

class HomeController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if ($user->is_admin) {
            return redirect()->route('providers.index');
        } else {
            return redirect()->route('locations.index');
        }
        abort(404);
    }

    public function domain(Provider $username)
    {
        $provider = $username;
        $provider->load(['locations', 'user']);
        return view('domain.index', compact('provider'));
    }
}
