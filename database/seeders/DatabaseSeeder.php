<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $services = [
            [
                'name' => 'روشویی',
                'duration' => '00:15:00',
                'cost' => '25000'
            ],
            [
                'name' => 'نظافت داخل ماشین',
                'duration' => '00:20:00',
                'cost' => '30000'
            ],
            [
                'name' => 'صفرشویی',
                'duration' => '01:00:00',
                'cost' => '80000'
            ]
        ];

        DB::table('services')->insert($services);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
