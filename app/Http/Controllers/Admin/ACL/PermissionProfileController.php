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
}
