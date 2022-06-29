<?php
namespace App\Services;

use App\Models\SiteUser;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\SiteInduction;

class SiteUserService
{
    public function getUserSiteDetails()
    {
        //
    }

    public function checkSiteSignInStatus($user, $site) {
            
        //check user is not currently signed into any other site
        $siteUsers = SiteUser::select()
        ->where('user_id', auth()->id())
        ->where('status', 'on site')
        ->get();
         
        $sites = Site::all();

        foreach($siteUsers as $siteUser){
            if ($siteUser->status == 'on site') {
                $onSite = true;
                return redirect()
                ->route('dashboard')
                ->with([
                    'warning' => "You cannot sign into multiple sites 
                    please sign out of current site first",
                    'onSite' => $onSite
                ]);
            }
        }
       
        return true;
    }

    public function checkInductionStatus($user)
    {
        //check company induction is in date
        if ($user->induction_expires == null or $user->induction_expires <= Carbon::now()) {
                
            return redirect()
            ->route('dashboard')
            ->with([
                'warning' => "Your induction status is not in date, 
                please complete your site induction before signing into site",
            ]);
        }
        else {
            return $inductionStatus = true;
        }
        
    }
 

    public function checkSiteAccessStatus($user, $site) {

        $sites = Site::all();
    
        //check user entry status for individual site, if access granted, access warning or access denied by site manager
        $checkEntryStatus = SiteInduction::select()
        ->where([
            ['site_id', $site->id],
            ['user_id', $user->id]
            ])
        ->first();

    if ($checkEntryStatus == NULL or $checkEntryStatus->status == 'access denied') {
        // return warning not granted access by site manager
        return redirect()
        ->route('dashboard')
        ->with([
        'warning' => "You do not have the correct permissions to enter " . $site->name . " site, please contact the site manager to gain access to site",
        ]);
    }
    else {
        return $entryStatus = true;
    }
    }

    public function signIntoSite($user, $site) {

        $sites = Site::all();

        //sign user into site with current time and date
        $user->sites()->attach($site->id, [
            'signed_in_by' => Auth::user()->id,
            'status' => 'on site', 
            'time_on_site' => Carbon::now()]);
        //dd($site_id, $user_id);
        $onSite = true;

        return redirect()
            ->route('dashboard')
            ->with([
                'success' => "You are signed into " . $site->name . " site",
                'onSite' => $onSite
                ]);
       
    }

}