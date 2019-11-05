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
        $this->call(IgbinarySeeder::class);
        $this->call(XdebugSeeder::class);
        $this->call(RedisSeeder::class);
        $this->call(MemcachedSeeder::class);
    }
}
