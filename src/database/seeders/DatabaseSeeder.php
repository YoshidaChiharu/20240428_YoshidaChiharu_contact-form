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
        // カテゴリデータの作成
        $this->call(CategoriesTableSeeder::class);

        // 問い合わせフォームのダミーデータ作成
        Contact::factory(35)->create();
    }
}
