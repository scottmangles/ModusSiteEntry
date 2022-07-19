<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSiteUserRequest;
use App\Http\Requests\UpdateSiteUserRequest;
use App\Models\Site;
use App\Models\SiteInduction;
use App\Models\SiteUser;
use App\Models\User;
use App\Services\SiteUserService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class SiteUserController extends Controller
{
    public $siteUserService;

    public function __construct(SiteUserService $siteUserService)
    {
        $this->siteUserService = $siteUserService;
        $this->middleware('permission:sign out by site manager')->only(['signOutSiteManager']);
        $this->middleware('permission:sign in by site manager')->only(['SignInSiteManager']);
    }

    public function findUserId($site_id)
    {   
        // find user id of logged in user and then pass to attach 
        //site user function to sign user onto construction site
        $user_id = Auth::user()->id;
        $site_id = intval($site_id);

        $user = User::find($user_id);
        $site = Site::find($site_id);

        return $this->attachSiteUser($user, $site);
    }

    public function attachSiteUser($user, $site)
    {   
        // check conditions all true from siteUserServie
        // before signing onto construction site
        $sites = Site::all();

        $accessStatus = $this->siteUserService->checkSiteAccessStatus($user, $site);
        $siteInductionStatus = $this->siteUserService->checkInductionStatus($user);
        $entryStatus = $this->siteUserService->checkSiteSignInStatus($user);

        if ($siteInductionStatus === true && $entryStatus === true && $accessStatus === true) {
            $this->siteUserService->signIntoSite($user, $site);
        }

        return redirect()
            ->route('dashboard')
            ->with([
                'sites' => $sites,
                'user' => $user,
            ]);
    }

    public function findUserIdOut($site_id)
    {
        // find user id of user to sign out of construction site
        // and check if currently signed into building site
        $user_id = Auth::user()->id;
        $site_id = intval($site_id);

        $siteUserIds = SiteUser::select()
            ->where('user_id', auth()->id())
            ->where('status', 'on site')
            ->get();

        foreach ($siteUserIds as $siteUserId) {
        }

        if (isset($siteUserId)) {
            return redirect()->route('signoutsite', [$siteUserId, $user_id, $site_id]);
        }

        return redirect()
            ->route('dashboard')
            ->with([
                'warning' => 'You are not currently signed into any sites 
                please sign in',
            ]);
    }

    public function signOutSiteUser($site_pivot_id, $user_id, $site_id)
    {
        // sign user out of construction site
        $user = User::find($user_id);
        $site = Site::find($site_id);

        $sites = Site::all();

        $siteUser = SiteUser::find($site_pivot_id);
        $siteUser->update(['status' => 'off site', 'time_off_site' => Carbon::now()]);

        return redirect()
            ->route('dashboard')
            ->with([
                'success' => 'You are signed out of '.$site->name.' site',
                'sites' => $sites,
                'user' => $user,
            ]);
    }

    public function signOutSiteManager($site_pivot_id, $user_id, $site_id)
    {
        $user = User::find($user_id);
        $site = Site::find($site_id);

        $sites = Site::all();

        $siteUser = SiteUser::find($site_pivot_id);
        $siteUser->update([
            'signed_out_by' => Auth::user()->id,
            'status' => 'off site',
            'time_off_site' => Carbon::now(), ]);

        return back()
           ->with([
               'success' => 'You have signed '.$user->name.' out of '.$site->name.' site',

           ]);
    }

    public function signInSiteManager(Request $request)
    {
        $sites = Site::all();
        $user = $request->user;
        $site = $request->site;

        //check site access status
        $accessStatus = $this->siteUserService->checkSiteAccessStatus($user, $site);
        //check induction status
        $siteInductionStatus = $this->siteUserService->checkInductionStatus($user);
        //check site entry status
        $entryStatus = $this->siteUserService->checkSiteSignInStatus($user);

        // if all 3 return true send to service sign in by site manager
        if ($siteInductionStatus === true && $entryStatus === true && $accessStatus === true) {
            $this->siteUserService->signIntoSite($user, $site);
        }
    

        return redirect()
            ->route('dashboard')
            ->with([
                'user' => $user,
                'sites' => $sites,
                'site' => $site
            ]);
        }

}
