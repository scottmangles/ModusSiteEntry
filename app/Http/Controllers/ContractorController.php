<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContractorRequest;
use App\Models\Contractor;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use GuzzleHttp\Middleware;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class ContractorController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:create_contractor')->only(['create']);
       // $this->middleware('admin')->only(['index', 'create', 'edit', 'update', 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contractors = Contractor::paginate(10);

        return view('contractors.index')->with([
            'contractors' => $contractors,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contractors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ContractorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContractorRequest $request)
    {
        //dd($request->validated());

        $contractor = Contractor::create($request->validated());

        return redirect()
            ->route('contractors.index')
            ->with(['success' => 'contractor '.$contractor->name.' added to database']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contractor  $contractor
     * @return \Illuminate\Http\Response
     */
    public function show(Contractor $contractor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contractor  $contractor
     * @return \Illuminate\Http\Response
     */
    public function edit(Contractor $contractor)
    {
        return view('contractors.edit')->with([
            'contractor' => $contractor,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ContractorRequest  $request
     * @param  \App\Models\Contractor  $contractor
     * @return \Illuminate\Http\Response
     */
    public function update(ContractorRequest $request, Contractor $contractor)
    {
        //dd($request->validated());

        $contractor->update($request->validated());

        return redirect()
            ->route('contractors.index')
            ->with(['success' => 'contractor '.$contractor->name.' has been updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contractor  $contractor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contractor $contractor)
    {
        return redirect()
            ->route('contractors.index')
            ->withWarning('you do not have permission to delete '.$contractor->name.' please contact database administrator');
    }
}
