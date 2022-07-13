<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\SiteInduction;
use App\Models\User;
use Illuminate\Http\Request;

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
