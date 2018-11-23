<?php

use Illuminate\Database\Seeder;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 200; $i++){
            DB::table('books')->insert([
                'user_name' => 'Алексей ' . $i,
                'email' => 'testing' . $i . '@yandex.ru',
                'home_page' => 'http://master.ru/news' . $i ,
                'text' => 'Отзыв ' . $i,
                'ip_address' => '129.144.52.' . $i,
                'user_agent' => 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1312.57 Safari/537.' . $i,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]);
        }
    }
}
