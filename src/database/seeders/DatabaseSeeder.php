<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // 誤作動しないようにコメントアウト
        // $this->call(CategoriesTableSeeder::class);

        Contact::factory(35)->create();
    }
}