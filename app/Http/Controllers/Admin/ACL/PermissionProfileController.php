<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Profile;
use Illuminate\Http\Request;

class PermissionProfileController extends Controller
{
    private $profile, $permission;

    public function __construct(Profile $profile, Permission $permission) {
        $this->profile = $profile;
        $this->permission = $permission;
    }

    public function index($idProfile){
        $profile = $this->profile->find($idProfile);


        if(!$profile){
            return redirect()->back();
        }

        $permissions = $profile->permissions()->paginate();

        return view('admin.pages.profiles.permissions.index', compact('profile', 'permissions'));
    }

    public function permissionsAvailable(Request $request, $idProfile){
        $filters = $request->except('_token');
        
        $profile = $this->profile->find($idProfile);

        if(!$profile){
            return redirect()->back();
        }
        
        $permissions = $profile->permissionsAvailable($request->filter);

        return view('admin.pages.profiles.permissions.available', compact('profile', 'permissions', 'filters'));
    }

    public function attachPermissionsProfile(Request $request, $idProfile)
    {
        $profile = $this->profile->find($idProfile);


        if(!$profile){
            return redirect()->back();
        }

        if(!$request->permissions || count($request->permissions) == 0){
            return redirect()->back()->with('error', 'Nenhuma permissão foi selecionada!');
        }

        $profile->permissions()->attach($request->permissions);
        
        return redirect()->route('profiles.permissions.index', $idProfile);
    }

    public function detachPermissionProfile($idProfile, $idPermission)
    {
        $profile = $this->profile->find($idProfile);
        $permission = $this->permission->find($idPermission);

        if(!$profile || !$permission){
            return redirect()->back();
        }

        $profile->permissions()->detach($permission);

        return redirect()->route('profiles.permissions.index', $idProfile);
    }

    public function profiles($idPermission){
        $permission = $this->permission->find($idPermission);

        if(!$permission){
            return redirect()->back();
        }

        $profiles = $permission->profiles()->paginate();

        return view('admin.pages.permissions.profiles.profiles', compact('permission', 'profiles'));
    }
}
