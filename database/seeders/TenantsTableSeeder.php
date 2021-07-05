<?php

namespace Database\Seeders;

use App\Models\Plan;
use App\Models\Tenant;
use Illuminate\Database\Seeder;

class TenantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plan = Plan::first();

        $plan->tenants()->create([
            'cnpj' => '23.882.270/0001-87',
            'name' => 'EspecializaTi',
            'url' => 'especializati',
            'email' => 'carlos@especializati.com.br'
        ]);
    }
}
