<?php

use Illuminate\Database\Seeder;
use App\Custom_poll;

class CustomPollsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Custom_poll::create([
            'name' => 'second',
        ]);
    }
}
