<?php
namespace App\Services;

use App\Models\SiteUser;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class SiteUserService
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

        foreach($siteUserIds as $siteUserId){
            $siteUserId;
        }

        //$site_user_id = intval($siteUserId);

        //dd($siteUserId->id, $user_id, $site_id);
        return $this->signOutSiteUser($siteUserId, $user_id, $site_id);
    }

    public function attachSiteUser($user_id, $site_id) {
       
        $user = User::find($user_id);
        $site = Site::find($site_id);
        
        $siteUsers = SiteUser::select()
            ->where('user_id', auth()->id())
            ->where('status', 'on site')
            ->get();
            
        $sites = Site::all();
        
        foreach($siteUsers as $siteUser){
            if ($siteUser->status == 'on site') {
                $onSite = true;
                return view('home')->with([
                    'message_warning' => "You cannot sign into multiple sites 
                    please sign out of current site first",
                    'sites' => $sites,
                    'user' => $user,
                    'onSite' => $onSite
                ]);
            }
        }

        $user->sites()->attach($site_id, ['status' => 'on site', 'time_on_site' => Carbon::now()]);
        //dd($site_id, $user_id);
        $onSite = true;

        return view('home')->with([
            'message_success' => "You are signed into <b>" . $site->name . "</b> site",
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
            ->route('/dashboard')
            ->with([
                'success' => "You are signed out of <b>" . $site->name . "</b> site",
                'sites' => $sites,
                'user' => $user
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
            return view('home')->with([
                'message_warning' => "You cannot sign into multiple sites 
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

            return view('home')->with([
            'message_success' => "You are signed into <b>" . $site->name . "</b> site",
            'user' => $user,
            'onSite' => $onSite
            ]);
        }
}