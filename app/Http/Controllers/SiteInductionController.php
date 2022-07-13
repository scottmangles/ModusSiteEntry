<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSiteInductionRequest;
use App\Http\Requests\UpdateSiteInductionRequest;
use App\Models\Site;
use App\Models\SiteInduction;
use App\Models\User;
use Illuminate\Http\Request;

class SiteInductionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $site = Site::find(auth()->user()->siteManager->id);

        $usersInductedIds = SiteInduction::where('site_id', $site->id)
            ->pluck('user_id');
        /*
        $usersInducted = SiteInduction::where([['site_id', $site->id], ['status', 'access granted']])
        ->orWhere([['site_id', $site->id], ['status', 'access warning']])
        ->orderBy('user_id')
        ->paginate(10);
         */
        $users = User::whereNotIn('id', $usersInductedIds)
            ->orderBy('name')
            ->paginate(8);

        return view('site_access.unassigned')->with([
            'users' => $users,
            'site' => $site,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSiteInductionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SiteInduction  $siteInduction
     * @return \Illuminate\Http\Response
     */
    public function show(SiteInduction $siteInduction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SiteInduction  $siteInduction
     * @return \Illuminate\Http\Response
     */
    public function edit(SiteInduction $siteInduction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSiteInductionRequest  $request
     * @param  \App\Models\SiteInduction  $siteInduction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SiteInduction $siteInduction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SiteInduction  $siteInduction
     * @return \Illuminate\Http\Response
     */
    public function destroy(SiteInduction $siteInduction)
    {
        //
    }
}
