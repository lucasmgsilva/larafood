<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'url', 'price', 'description'];

    public function details(){
        return $this->hasMany(DetailPlan::class);
    }

    public function search($filter = null){        
        $plans = $this->where('name', 'LIKE', "%{$filter}%")->orWhere('description', 'LIKE', "%{$filter}%")->paginate();

        return $plans;
    }
}
