<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Box;
use App\Models\Tenant;
use App\Models\ContractModel;
use App\Models\Contract;
use App\Models\Bill;

// use function Laravel\Prompts\password;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'email' => 'sylvain.test@test.com',
            'password' => 'password',
        ]);
        User::factory(10)->create([
            'password' => 'password',
        ]);
        Box::factory(10)->create();
        Tenant::factory(10)->create();
        // ContractModel::factory()->create();
        Contract::factory(10)->create();
        Bill::factory(10)->create();

    }
}
