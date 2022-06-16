<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Site;
use App\Models\SiteInduction;

class SiteAccessController extends Controller
{

    public function showusersAccess()
    {
        $site = Site::find(auth()->user()->siteManager->id);

        $usersInductedIds = SiteInduction::where('site_id', $site->id)
            ->pluck('user_id');
        
        $usersInducted = SiteInduction::where([['site_id', $site->id], ['status', 'access granted']])
        ->orWhere([['site_id', $site->id], ['status', 'access warning']])
        ->orderBy('user_id')    
        ->paginate(8);
         

        return view('site_access.allow')->with([
            'site' => $site,
           'usersInducted' => $usersInducted,
        ]);
    }

    public function showusersBanned()
    {
        $site = Site::find(auth()->user()->siteManager->id);

        $bannedSites = SiteInduction::select()
        ->where([['status', '=', 'access denied'],
            ['site_id', '=', $site->id],])
        ->paginate(10);

        return view('site_access.banned')->with([
            'site' => $site,
            'bannedSites' => $bannedSites,
        ]);
    }

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

        public function changeToAccess($siteInduction_id, $user_id, $site_id)
        {
            $siteInduction = SiteInduction::find($siteInduction_id);
            $user = User::find($user_id);
            $site = Site::find($site_id);
            $siteManager = auth()->user()->id;
            //dd($user_id, $site_id, $user->id, $site->id, $siteManager);
            
            $siteInduction->update([
                'user_id' => $user_id,
                'site_id' => $site_id,
                'status' => 'access granted',
                'notes' => 'access granted ' . now(),
                'completed_by' => $siteManager,

            ]);

            return back()->with([
                'success' => $user->name . " access changed to granted access for " . $site->name . " site"
            ]);
           
        }

        public function changeToSupervised($siteInduction_id, $user_id, $site_id)
        {
            $siteInduction = SiteInduction::find($siteInduction_id);
            $user = User::find($user_id);
            $site = Site::find($site_id);
            $siteManager = auth()->user()->id;
            //dd($user_id, $site_id, $user->id, $site->id, $siteManager);
            
            $siteInduction->update([
                'user_id' => $user_id,
                'site_id' => $site_id,
                'status' => 'access warning',
                'notes' => 'access warning ' . now(),
                'completed_by' => $siteManager,

            ]);

            return back()->with([
                'success' => $user->name . " access changed to supervised access for " . $site->name . " site"
            ]);
           
        }

        public function banAccess($siteInduction_id, $user_id, $site_id)
        {
            $siteInduction = SiteInduction::find($siteInduction_id);
            $user = User::find($user_id);
            $site = Site::find($site_id);
            $siteManager = auth()->user()->id;
            //dd($user_id, $site_id, $user->id, $site->id, $siteManager);
            
            $siteInduction->update([
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
