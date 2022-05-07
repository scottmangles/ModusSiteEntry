<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSiteInductionRequest;
use App\Http\Requests\UpdateSiteInductionRequest;
use App\Models\SiteInduction;

class SiteInductionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('site_inductions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('site_inductions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSiteInductionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSiteInductionRequest $request)
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
    public function update(UpdateSiteInductionRequest $request, SiteInduction $siteInduction)
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
