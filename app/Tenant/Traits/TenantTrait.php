<?php

namespace App\Tenant\Traits;

use App\Tenant\Observers\TenantObserver;
use App\Tenant\Scopes\TenantScope;

trait TenantTrait {
    public static function booted(){
        static::observe(TenantObserver::class);

        static::addGlobalScope(new TenantScope);
    }
}