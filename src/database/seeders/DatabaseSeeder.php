<?php

namespace Database\Seeders;

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
        $this->call(
            [
                CategoriesTableSeeder::class, // ✅ カテゴリはこのSeederに任せる
            ]);

                \App\Models\Contact::factory(35)->create(); // 次にコンタクトを作成

        //$this->call(ContactSeeder::class);
    }
}
