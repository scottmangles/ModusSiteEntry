<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Site;
use App\Models\SiteInduction;

class DashboardController extends Controller
{

    public function dashboard()
    {

        $user = User::find(auth()->id());
        $sites = Site::all();
        $siteInductions = SiteInduction::where('user_id', auth()->id())->get();

        //dd($siteInductions);
    return view('dashboard')->with([
        'user' => $user,
        'sites' => $sites,
        'siteInductions' => $siteInductions,
    ]);
}
}
