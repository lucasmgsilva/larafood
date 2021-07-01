<?php

namespace App\Observers;

use App\Models\Plan;
use Illuminate\Support\Str;

class PlanObserver
{
    /**
     * Handle the Plan "created" event.
     *
     * @param  \App\Models\Plan  $plan
     * @return void
     */
    public function creating(Plan $plan){
        $plan->url = Str::kebab($plan->name);
    }

    public function updating(Plan $plan){
        $plan->url = Str::kebab($plan->name);
    }
    
    
    // public function created(Plan $plan)
    // {
    //     //
    // }

    // /**
    //  * Handle the Plan "updated" event.
    //  *
    //  * @param  \App\Models\Plan  $plan
    //  * @return void
    //  */
    // public function updated(Plan $plan)
    // {
    //     //
    // }

    // /**
    //  * Handle the Plan "deleted" event.
    //  *
    //  * @param  \App\Models\Plan  $plan
    //  * @return void
    //  */
    // public function deleted(Plan $plan)
    // {
    //     //
    // }

    // /**
    //  * Handle the Plan "restored" event.
    //  *
    //  * @param  \App\Models\Plan  $plan
    //  * @return void
    //  */
    // public function restored(Plan $plan)
    // {
    //     //
    // }

    // /**
    //  * Handle the Plan "force deleted" event.
    //  *
    //  * @param  \App\Models\Plan  $plan
    //  * @return void
    //  */
    // public function forceDeleted(Plan $plan)
    // {
    //     //
    // }
}
