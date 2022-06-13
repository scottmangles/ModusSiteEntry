<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiteRequest;
use App\Models\Site;
use App\Models\SiteInduction;
use App\Models\User;
use Illuminate\Support\Carbon;
use App\Models\SiteUser;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function __construct()
    {
       
        $this->middleware('site_manager')->only(['show']);
        $this->middleware('admin')->only(['index', 'create', 'edit', 'update', 'destroy']);
    }

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
        $users = User::where(
            'role', 'site_manager'
            )->get();
        
       // dd($users);
        
        return view('sites.create')->with([
            'users' => $users,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSiteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SiteRequest $request)
    {
        //dd($request->validated());
        $site = Site::create($request->validated());

        return redirect()
            ->route('sites.index')
            ->with(['success' => $site->name . " site added to database."
        ]); 
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

        $bannedSites = SiteInduction::select()
            ->where([['status', '=', 'access denied'],
                ['site_id', '=', $site->id],])
            ->get();
          //dd($bannedSites);
       // dd($onSites);

        return view('sites.show')->with([
            'site' => $site,
            'users' => $users,
            'onSites' => $onSites,
            'offSites' => $offSites,
            'bannedSites' => $bannedSites,
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
        $users = User::where(
            'role', 'site_manager'
            )->get();

        return view('sites.edit')->with([
            'users' => $users,
            'site' => $site,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSiteRequest  $request
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function update(SiteRequest $request, Site $site)
    {
        $site->update($request->validated());

        return redirect()
            ->route('sites.index')
            ->with(['success' => $site->name . " site has been updated."
        ]);
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
