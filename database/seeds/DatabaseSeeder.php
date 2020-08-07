<?php

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
        //把ArticleSeeder注册到系统内
        $this->call(ArticleSeeder::class);
    }
}
