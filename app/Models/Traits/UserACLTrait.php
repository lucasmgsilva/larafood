<?php

namespace App\Models\Traits;

use Illuminate\Support\Facades\Config;

trait UserACLTrait 
{
    public function permissions()
    {
        $tenant = $this->tenant()->first();
        $plan = $tenant->plan()->first();
        $profiles = $plan->profiles;

        $permissions = [];
        foreach ($profiles as $profile) {
            foreach ($profile->permissions as $permission) {
                $permissions[] = $permission->name;
            }
        }
        return $permissions;
    }

    public function hasPermission(string $permissionName) : bool {
        return in_array($permissionName, $this->permissions());
    }

    public function isAdmin(){
        return in_array($this->email, config('acl.admins'));
    }

    public function isTenant(){
        return !in_array($this->email, config('acl.admins'));
    }
}