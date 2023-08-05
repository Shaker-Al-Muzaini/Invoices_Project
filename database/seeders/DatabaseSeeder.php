<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

/**
 * @property $faker
 */
class DatabaseSeeder extends Seeder
{


    /**
     * Seed the application's database.
     */
    public function run()
    {
//         \App\Models\Product::factory(10)->create();
        \App\Models\Customer::create([
            'address' =>'sf',
            'email' => "dfd@g,sf",
            'firstname' => 'shaker',
            'lastname' => 'almaznin',
        ]);
    }
}
