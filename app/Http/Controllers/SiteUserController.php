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
        $this->middleware('auth');
    }

    public function findUserId($site_id)
    {
        $user_id = Auth::user()->id;
        $site_id = intval($site_id);

        $user = User::find($user_id);
        $site = Site::find($site_id);

        return $this->attachSiteUser($user, $site);
    }

    public function attachSiteUser($user, $site)
    {
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

    public function manualSiteEntry(Request $request)
    {
        $user_id = Auth::user()->id;
        $site_id = intval($request->site_id);

        $siteUsers = SiteUser::select()
        ->where('user_id', auth()->id())
        ->where('status', 'on site')
        ->get();

        $user = User::find($user_id);

        foreach ($siteUsers as $siteUser) {
            if ($siteUser->status == 'on site') {
                $onSite = true;

                return redirect()
                ->route('dashboard')
                ->with([
                    'warning' => 'You cannot sign into multiple sites 
                    please sign out of current site first',
                    'user' => $user,
                    'onSite' => $onSite,
                ]);
            }
        }

        $request->validate([
            'site_id' => 'required',
        ]);

        $siteUser = new SiteUser([
            'site_id' => $site_id,
            'user_id' => $user_id,
            'status' => 'on site',
            'time_on_site' => Carbon::now(),
        ]);

        $siteUser->save();

        $site = Site::find($siteUser->site_id);

        $onSite = true;

        return redirect()
                ->route('dashboard')
                ->with([
                    'success' => 'You are signed into '.$site->name.' site',
                    'user' => $user,
                    'onSite' => $onSite,
                ]);
    }
}
