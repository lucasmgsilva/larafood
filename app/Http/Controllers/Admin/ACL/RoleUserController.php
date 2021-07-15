<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleUserController extends Controller
{
    private $role, $user;

    public function __construct(Role $role, User $user) {
        $this->role = $role;
        $this->user = $user;

        $this->middleware(['can:Cargos']);
    }

    public function index($idRole){
        $role = $this->role->find($idRole);


        if(!$role){
            return redirect()->back();
        }

        $users = $role->users()->paginate();

        return view('admin.pages.roles.users.index', compact('role', 'users'));
    }

    public function usersAvailable(Request $request, $idRole){
        $filters = $request->except('_token');
        
        $role = $this->role->find($idRole);

        if(!$role){
            return redirect()->back();
        }
        
        $users = $role->usersAvailable($request->filter);

        return view('admin.pages.roles.users.available', compact('role', 'users', 'filters'));
    }

    public function attachUsersRole(Request $request, $idRole)
    {
        $role = $this->role->find($idRole);


        if(!$role){
            return redirect()->back();
        }

        if(!$request->users || count($request->users) == 0){
            return redirect()->back()->with('error', 'Nenhum plano foi selecionado!');
        }

        $role->users()->attach($request->users);
        
        return redirect()->route('roles.users.index', $idRole);
    }

    public function detachRoleUser($idRole, $idUser)
    {
        $role = $this->role->find($idRole);
        $user = $this->user->find($idUser);

        if(!$role || !$user){
            return redirect()->back();
        }

        $role->users()->detach($user);

        return redirect()->route('roles.users.index', $idRole);
    }

    public function roles($idUser){
        $user = $this->user->find($idUser);

        if(!$user){
            return redirect()->back();
        }

        $roles = $user->roles()->paginate();

        return view('admin.pages.users.roles.roles', compact('user', 'roles'));
    }
}
