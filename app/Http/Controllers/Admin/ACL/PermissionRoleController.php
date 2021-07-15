<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class PermissionRoleController extends Controller
{
    private $role, $permission;

    public function __construct(Role $role, Permission $permission) {
        $this->role = $role;
        $this->permission = $permission;

        $this->middleware(['can:Cargos']);
    }

    public function index($idRole){
        $role = $this->role->find($idRole);


        if(!$role){
            return redirect()->back();
        }

        $permissions = $role->permissions()->paginate();

        return view('admin.pages.roles.permissions.index', compact('role', 'permissions'));
    }

    public function permissionsAvailable(Request $request, $idRole){
        $filters = $request->except('_token');
        
        $role = $this->role->find($idRole);

        if(!$role){
            return redirect()->back();
        }
        
        $permissions = $role->permissionsAvailable($request->filter);

        return view('admin.pages.roles.permissions.available', compact('role', 'permissions', 'filters'));
    }

    public function attachPermissionsRole(Request $request, $idRole)
    {
        $role = $this->role->find($idRole);


        if(!$role){
            return redirect()->back();
        }

        if(!$request->permissions || count($request->permissions) == 0){
            return redirect()->back()->with('error', 'Nenhum plano foi selecionado!');
        }

        $role->permissions()->attach($request->permissions);
        
        return redirect()->route('roles.permissions.index', $idRole);
    }

    public function detachPermissionRole($idRole, $idPermission)
    {
        $role = $this->role->find($idRole);
        $permission = $this->permission->find($idPermission);

        if(!$role || !$permission){
            return redirect()->back();
        }

        $role->permissions()->detach($permission);

        return redirect()->route('roles.permissions.index', $idRole);
    }

    public function roles($idPermission){
        $permission = $this->permission->find($idPermission);

        if(!$permission){
            return redirect()->back();
        }

        $roles = $permission->roles()->paginate();

        return view('admin.pages.permissions.roles.roles', compact('permission', 'roles'));
    }
}
