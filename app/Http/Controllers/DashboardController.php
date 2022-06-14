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
        $siteInductions = SiteInduction::where('user_id', auth()->id())->get();
        $sitesInducted = SiteInduction::where('user_id', auth()->id())->pluck('site_id');
        $sites = Site::whereNotIn('id', $sitesInducted)->paginate(5);

    return view('dashboard')->with([
        'user' => $user,
        'sites' => $sites,
        'siteInductions' => $siteInductions,
    ]);
}
}
