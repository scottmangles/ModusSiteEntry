<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{

    public function dashboard()
    {

        $user = User::find(auth()->id());

       // dd($user);
    return view('dashboard')->with([
        'user' => $user,
    ]);
}
}
