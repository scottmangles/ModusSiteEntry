<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Site;
use App\Models\SiteInduction;

class SiteAccessController extends Controller
{
    public function allowAccess($user_id, $site_id)
        {
            $user = User::find($user_id);
            $site = Site::find($site_id);
            $siteManager = auth()->user()->id;
            //dd($user_id, $site_id, $user->id, $site->id, $siteManager);
            
            SiteInduction::create([
                'user_id' => $user_id,
                'site_id' => $site_id,
                'status' => 'access granted',
                'notes' => 'access granted ' . now(),
                'completed_by' => $siteManager,

            ]);

            return back()->with([
                'success' => $user->name . " granted access to " . $site->name . " site"
            ]);
           
        }


        public function allowSupervised($user_id, $site_id)
        {
            $user = User::find($user_id);
            $site = Site::find($site_id);
            $siteManager = auth()->user()->id;
            //dd($user_id, $site_id, $user->id, $site->id, $siteManager);
            
            SiteInduction::create([
                'user_id' => $user_id,
                'site_id' => $site_id,
                'status' => 'access warning',
                'notes' => 'access warning ' . now(),
                'completed_by' => $siteManager,

            ]);

            return back()->with([
                'success' => $user->name . " supervised access to " . $site->name . " site"
            ]);
        }

        public function banAccess($user_id, $site_id)
        {
            $user = User::find($user_id);
            $site = Site::find($site_id);
            $siteManager = auth()->user()->id;
            //dd($user_id, $site_id, $user->id, $site->id, $siteManager);
            
            SiteInduction::create([
                'user_id' => $user_id,
                'site_id' => $site_id,
                'status' => 'access denied',
                'notes' => 'access denied ' . now(),
                'completed_by' => $siteManager,

            ]);

            return back()->with([
                'success' => $user->name . " has been banned from " . $site->name . " site"
            ]);
        }
    
}
