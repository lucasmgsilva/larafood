<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'url', 'price', 'description'];

    public function search($filter = null){        
        if(!$filter){
            return redirect()->route('plans.index');
        }
        
        $plans = $this->where('name', 'LIKE', "%{$filter}%")->orWhere('description', 'LIKE', "%{$filter}%")->paginate(1);
        
        return $plans;
    }
}
