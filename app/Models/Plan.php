<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'url', 'price', 'description'];

    public function profiles(){
        return $this->belongsToMany(Profile::class);
    }

    public function details(){
        return $this->hasMany(DetailPlan::class);
    }

    public function search($filter = null){        
        $plans = $this->where('name', 'LIKE', "%{$filter}%")->orWhere('description', 'LIKE', "%{$filter}%")->paginate();

        return $plans;
    }
    
    public function profilesAvailable($filter = null){
        
        $profiles = Profile::whereNotIn('profiles.id', 
            function($query) {
                $query->select('plan_profile.profile_id');
                $query->from('plan_profile');
                $query->whereRaw("plan_profile.plan_id = $this->id");
            }
        )->where(function($queryFilter) use ($filter) {
            if($filter){
                $queryFilter->where('profiles.name', 'LIKE', "%{$filter}%");
            }
        })->paginate();

        // $profiles = Permission::whereNotIn('profiles.id', 
        //     function($query) {
        //         $query->select('plan_profile.permission_id');
        //         $query->from('plan_profile');
        //         $query->whereRaw("plan_profile.profile_id = $this->id");
        //     }
        // )->where('profiles.name', 'LIKE', "%{$filter}%")->paginate();

        // $profiles = Permission::whereNotIn('id', 
        //     $this->profiles
        // )->paginate();

        return $profiles;
    }
}
