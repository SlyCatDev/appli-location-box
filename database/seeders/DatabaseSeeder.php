<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Box;
use App\Models\Tenant;
use App\Models\ContractModel;

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
        ContractModel::factory()->create();

    }
}
