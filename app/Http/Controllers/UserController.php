<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Contractor;
use Illuminate\Support\Facades\Gate;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->only(['index', 'destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);

        return view('users.index')->with([
            'users' => $users,
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        abort_unless(Gate::allows('update', $user), 403, 'You are not authorised to edit this user profile');

        $contractors = Contractor::all();

        return view('users.edit')->with([
            'user' => $user,
            'contractors' => $contractors,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {

        abort_unless(Gate::allows('update', $user), 403, 'You are not authorised to edit this user profile');
        //dd($request->user, $request->validated());

        $user->update($request->validated());

        return redirect()
            ->route('users.index')
            ->with(['success' => $user->name . "'s profile has been updated."
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        abort_unless(Gate::allows('delete', $user), 403, 'You are not authorised to delete this user profile');
        return redirect()
            ->route('users.index')
            ->with(['warning' => 'you do not have permission to delete ' . $user->name . ' please contact database admin'
        ]);
    }
}
