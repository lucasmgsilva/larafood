<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description'];

    public function permissions(){
        return $this->belongsToMany(Permission::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function permissionsAvailable($filter = null){
        $permissions = Permission::whereNotIn('permissions.id', 
            function($query) {
                $query->select('permission_role.permission_id');
                $query->from('permission_role');
                $query->whereRaw("permission_role.role_id = $this->id");
            }
        )->where(function($queryFilter) use ($filter) {
            if($filter){
                $queryFilter->where('permissions.name', 'LIKE', "%{$filter}%");
            }
        })->paginate();

        // $permissions = Permission::whereNotIn('permissions.id', 
        //     function($query) {
        //         $query->select('permission_profile.permission_id');
        //         $query->from('permission_profile');
        //         $query->whereRaw("permission_profile.profile_id = $this->id");
        //     }
        // )->where('permissions.name', 'LIKE', "%{$filter}%")->paginate();

        // $permissions = Permission::whereNotIn('id', 
        //     $this->permissions
        // )->paginate();

        return $permissions;
    }
}
