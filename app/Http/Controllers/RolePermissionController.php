<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RolePermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view all user roles and permissions')->only(['viewRolesPermissions']);
        $this->middleware('permission:update role')->only(['updateRole']);
        $this->middleware('permission:remove role from user')->only(['removeRole']);
        $this->middleware('permission:add permission to user')->only(['addPermissions']);
        $this->middleware('permission:remove permission from user')->only(['removePermissions']);
    }
    public function viewRolesPermissions($user_id)
    {
        $user = User::find($user_id);
 
        $roles = Role::all();
        $permissions = Permission::all()
            ->sortBy('name');

        return view('users.rolepermission')->with([
            'user' => $user,
            'roles' => $roles,
            'permissions' => $permissions,
        ]);

    }

    public function updateRole(Request $request, $user_id)
    {
        $role = Role::find(intval($request->role));
        $user = User::find($user_id);

        if ($request->role == null) {
            return redirect()
            ->route('viewroles', $user_id)
            ->withWarning("No role selected please select a role..."
            );
        }

        $user->syncRoles($role);

        return redirect()
            ->route('viewroles', $user_id)
            ->withSuccess($user->name."'s role has been updated to " . $role->name
            );
    }

    public function removeRole($user_id)
    {
        $user = User::find($user_id);

        $user->syncRoles();

        return redirect()
            ->route('viewroles', $user_id)
            ->withSuccess($user->name."'s role has been removed"
            );

    }

    public function addPermission(Request $request, $user_id)
    {
        $permission = Permission::find(intval($request->permission));
        $user = User::find($user_id);

        if ($request->permission == null) {
            return redirect()
            ->route('viewroles', $user_id)
            ->withWarning("No permission selected please select a permission..."
            );
        }

        $user->givePermissionTo($permission);

        return redirect()
            ->route('viewroles', $user_id)
            ->withSuccess($user->name."'s has recieved permission to " . $permission->name
            );
    }

    public function removePermission($user_id, $permission_id)
    {
        $user = User::find($user_id);
        $permission = Permission::find($permission_id);

        $user->revokePermissionTo($permission);

        return redirect()
            ->route('viewroles', $user_id)
            ->withSuccess($permission->name . " has been removed from " . $user->name
            );

    }

}
