<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\SiteInduction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteAccessController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:show users with no site access')->only(['showUsersNosAccess']);
        $this->middleware('permission:show users with site access')->only(['showUsersAccess']);
        $this->middleware('permission:show users banned from site')->only(['showUsersBanned']);
        $this->middleware('permission:allow access to site')->only(['allowAccess']);
        $this->middleware('permission:allow supervised access to site')->only(['allowSupervised']);
        $this->middleware('permission:update site access to granted')->only(['changeToAccessGranted']);
        $this->middleware('permission:update site access to supervised')->only(['changeToSupervised']);
        $this->middleware('permission:ban user from site')->only(['banAccess']);
    }

    public function showUsersNoAccess()
    {
        $site = Site::find(auth()->user()->siteManager->id);

        $usersInductedIds = SiteInduction::where('site_id', $site->id)
            ->pluck('user_id');
       
        $users = User::whereNotIn('id', $usersInductedIds)
            ->orderBy('name')
            ->paginate(8);

        return view('site_access.unassigned')->with([
            'users' => $users,
            'site' => $site,
        ]);
    }

    public function showUsersAccess()
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

    public function showUsersBanned()
    {
        $site = Site::find(auth()->user()->siteManager->id);

        $bannedSites = SiteInduction::select()
        ->where([['status', '=', 'access denied'],
            ['site_id', '=', $site->id], ])
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
            'notes' => 'access granted '.now(),
            'completed_by' => $siteManager,

        ]);

        return back()->with([
            'success' => $user->name.' granted access to '.$site->name.' site',
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
            'notes' => 'access warning '.now(),
            'completed_by' => $siteManager,

        ]);

        return back()->with([
            'success' => $user->name.' supervised access to '.$site->name.' site',
        ]);
    }

    public function changeToAccessGranted($siteInduction_id, $user_id, $site_id)
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
            'notes' => 'access granted '.now(),
            'completed_by' => $siteManager,

        ]);

        return back()->with([
            'success' => $user->name.' access changed to granted access for '.$site->name.' site',
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
            'notes' => 'access warning '.now(),
            'completed_by' => $siteManager,

        ]);

        return back()->with([
            'success' => $user->name.' access changed to supervised access for '.$site->name.' site',
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
            'notes' => 'access denied '.now(),
            'completed_by' => $siteManager,

        ]);

        return back()->with([
            'success' => $user->name.' has been banned from '.$site->name.' site',
        ]);
    }
}
