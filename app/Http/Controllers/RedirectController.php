<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectController extends Controller
{
    public function redirectUser(){
        $is_admin = Auth::user()->is_admin;

        // return $is_admin;

        if($is_admin == 1){
            // Admin
            return redirect()->route("providers");
        }else{
            // Provider
            return redirect()->route("locations",Auth::user()->provider);
        }
    }
}
