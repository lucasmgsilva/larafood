<?php

namespace App\Models\Traits;

use App\Models\Tenant;
use Illuminate\Support\Facades\Config;

trait UserACLTrait 
{
    public function permissions(): array
    {
        $permissionsPlan = $this->permissionsPlan();
        $permissionsRole = $this->permissionsRole();

        $permissions = [];
        foreach ($permissionsRole as $permission) {
            if(in_array($permission, $permissionsPlan)){
                $permissions[] = $permission;
            }
        }

        return $permissions;
    }

    public function permissionsRole(): array
    {
        $roles = $this->roles()->with('permissions')->get();
        $permissions = [];

        foreach ($roles as $role) {
            foreach ($role->permissions as $permission) {
                $permissions[] = $permission->name;
            }
        }

        return $permissions;
    }

    public function permissionsPlan(): array {
        // $tenant = $this->tenant()->first();
        // $plan = $tenant->plan()->first();
        $tenant = Tenant::white('plan.profiles.permissions')->where('id', $this->tenant_id)->first();
        $plan = $tenant->plan;

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