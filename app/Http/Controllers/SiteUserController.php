<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSiteUserRequest;
use App\Http\Requests\UpdateSiteUserRequest;
use App\Models\SiteUser;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\SiteInduction;

class SiteUserController extends Controller
{
    public function findUserId($site_id) {

        $user_id = Auth::user()->id;
        $site_id = intval( $site_id );

        //dd($user_id, $site_id);
        return redirect()->route('signinsite', [$user_id, $site_id]);
    }

    public function findUserIdOut($site_id) {

        $user_id = Auth::user()->id;
        $site_id = intval( $site_id );

        $siteUserIds = SiteUser::select()
            ->where('user_id', auth()->id())
            ->where('status', 'on site')
            ->get();

           // dd($siteUserIds);

        

        foreach($siteUserIds as $siteUserId){
            $siteUserId;
        }

        if (isset($siteUserId)) {
        
            //$site_user_id = intval($siteUserId);

            //dd($siteUserId->id, $user_id, $site_id);
            return redirect()->route('signoutsite', [$siteUserId, $user_id, $site_id]);
            
        }

        return redirect()
            ->route('dashboard')
            ->with([
                'warning' => "You are not currently signed into any sites 
                please sign in",
            ]);

        
    }

    public function attachSiteUser($user_id, $site_id) {
       
        $user = User::find($user_id);
        $site = Site::find($site_id);
        
        $siteUsers = SiteUser::select()
            ->where('user_id', auth()->id())
            ->where('status', 'on site')
            ->get();
            
        $sites = Site::all();
        
        //check user is not currently signed into any other site
        foreach($siteUsers as $siteUser){
            if ($siteUser->status == 'on site') {
                $onSite = true;
                return redirect()
                ->route('dashboard')
                ->with([
                    'warning' => "You cannot sign into multiple sites 
                    please sign out of current site first",
                    'sites' => $sites,
                    'user' => $user,
                    'onSite' => $onSite
                ]);
            }
        }
            //check company induction is in date
            if ($user->induction_expires == null or $user->induction_expires <= Carbon::now()) {
                
                return redirect()
                ->route('dashboard')
                ->with([
                    'warning' => "Your induction status is not in date, 
                    please complete your site induction before signing into site",
                    'sites' => $sites,
                    'user' => $user,
                ]);
            }

            //check user entry status for individual site, if access granted, access warning or access denied by site manager
            $checkEntryStatus = SiteInduction::select()
                ->where([
                    ['site_id', $site->id],
                    ['user_id', $user->id]
                    ])
                ->first();

    
                
           // dd($checkEntryStatus);

            if ($checkEntryStatus == 'access denied' or $checkEntryStatus == null) {
                // return warning not granted access by site manager
                return redirect()
                ->route('dashboard')
                ->with([
                'warning' => "You do not have the correct permissions to enter " . $site->name . " site, please contact the site manager to gain access to site",
                'sites' => $sites,
                'user' => $user,
                ]);
            }
        
        
        //sign user into site with current time and date
        $user->sites()->attach($site_id, ['status' => 'on site', 'time_on_site' => Carbon::now()]);
        //dd($site_id, $user_id);
        $onSite = true;

        return redirect()
            ->route('dashboard')
            ->with([
                'success' => "You are signed into " . $site->name . " site",
                'sites' => $sites,
                'user' => $user,
                'onSite' => $onSite
                ]);
    }

    public function signOutSiteUser($site_pivot_id, $user_id, $site_id) {
         $user = User::find($user_id);
         $site = Site::find($site_id);

         $sites = Site::all();

        $siteUser = SiteUser::find($site_pivot_id);
           $siteUser->update(['status' => 'off site', 'time_off_site' => Carbon::now()]);
         return redirect()
            ->route('dashboard')
            ->with([
                'success' => "You are signed out of " . $site->name . " site",
                'sites' => $sites,
                'user' => $user
            ]);
     }


     public function signOutSiteManager($site_pivot_id, $user_id, $site_id) {
        $user = User::find($user_id);
        $site = Site::find($site_id);

        $sites = Site::all();

       $siteUser = SiteUser::find($site_pivot_id);
          $siteUser->update(['status' => 'off site', 'time_off_site' => Carbon::now()]);
        return back()
           ->with([
               'success' => "You have signed " . $user->name . " out of " . $site->name . " site",
              
           ]);
    }

     public function manualSiteEntry(Request $request) {
        $user_id = Auth::user()->id;
        $site_id = intval($request->site_id);

        $siteUsers = SiteUser::select()
        ->where('user_id', auth()->id())
        ->where('status', 'on site')
        ->get();
        
    $user = User::find($user_id);

    foreach($siteUsers as $siteUser){
        if ($siteUser->status == 'on site') {
            $onSite = true;
            return redirect()
                ->route('dashboard')
                ->with([
                    'warning' => "You cannot sign into multiple sites 
                    please sign out of current site first",
                    'user' => $user,
                    'onSite' => $onSite
                ]);
        }
    }

        $request->validate([
            'site_id' => 'required'
        ]); 

        $siteUser = new SiteUser([
            'site_id' => $site_id,
            'user_id' => $user_id,
            'status' => 'on site',
            'time_on_site' => Carbon::now()
        ]);

            $siteUser->save();

            $site = Site::find($siteUser->site_id);

            $onSite = true;

            return redirect()
                ->route('dashboard')
                ->with([
                'success' => "You are signed into " . $site->name . " site",
                'user' => $user,
                'onSite' => $onSite
                ]);
        }
}
