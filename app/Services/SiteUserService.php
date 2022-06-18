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
    //find user id from qr code
    public function findUserId($site_id) {

        $user_id = Auth::user()->id;
        $site_id = intval( $site_id );

        //dd($user_id, $site_id);
        return back()->with([$user_id, $site_id]);
    }

    public function getUserSiteDetails()
    {

    }

    public function checkSiteSignInStatus($user, $site, $siteUsers, $sites) {
       
            
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

        return $this->siteUsers;
    }

    public function checkInductionStatus($user, $sites)
    {
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
    }

    public function checkSiteEntryStatus($site, $user, $sites)
    
    {
        //check user entry status for individual site, if access granted, access warning or access denied by site manager
        $checkEntryStatus = SiteInduction::select()
        ->where([
            ['site_id', $site->id],
            ['user_id', $user->id]
            ])
        ->first();


    // check if user has never been to site or if user has been banned from site
    if ($checkEntryStatus == NULL or $checkEntryStatus->status == 'access denied') {
        // return warning not granted access by site manager
        return redirect()
        ->route('dashboard')
        ->with([
        'warning' => "You do not have the correct permissions to enter " . $site->name . " site, please contact the site manager to gain access to site",
        'sites' => $sites,
        'user' => $user,
        ]);
    }

    return $this->checkEntryStatus;

    }

}