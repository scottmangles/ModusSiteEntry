<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSiteRequest;
use App\Http\Requests\UpdateSiteRequest;
use App\Models\Site;
use App\Models\User;
use Illuminate\Support\Carbon;
use App\Models\SiteUser;
use Symfony\Component\HttpFoundation\Request;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sites = Site::all();

        
        return view('sites.index')->with([
            'sites' => $sites,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sites.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSiteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function show(Site $site)
    {   
        $users = User::all();

        $onSites = SiteUser::select()
            ->where([['status', '=', 'on site'],
                ['site_id', '=', $site->id]
            ])
            ->get();

        $offSites = SiteUser::select()
            ->WhereDate('time_off_site', Carbon::today())
            ->where([['status', '=', 'off site'],
                ['site_id', '=', $site->id],])
            ->get();

       // dd($onSites);

        return view('sites.show')->with([
            'site' => $site,
            'users' => $users,
            'onSites' => $onSites,
            'offSites' => $offSites,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function edit(Site $site)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSiteRequest  $request
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSiteRequest $request, Site $site)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function destroy(Site $site)
    {
        return redirect()
            ->route('sites.index')
            ->withWarning("you do not have permission to delete " . $site->name . " please contact database administrator");
    }
}
