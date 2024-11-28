<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // ファクトリとシーダーを同時に使用してシーディングするとエラーが起きるので、片方をコメントアウトして2回シーディングする
        
        Contact::factory(35)->create();

        // $this->call(CategoriesTableSeeder::class);
    }
}
