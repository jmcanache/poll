<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(CustomPollsTableSeeder::class);
        //$this->call(CommonTableSeeder::class);
        //$this->call(IndicatorsTableSeeder::class);
       	//$this->call(DataIndicatorsTableSeeder::class);
       	//$this->call(TableIndicatorTableSeeder::class);
        //$this->call(CustomPollsDescritionSeeder::class);
        //$this->call(IndicatorTablePointsSeeder::class);
        //$this->call(CommonTableAddHelpTextSeeder::class);
        $this->call(IndicatorTableAddRelevanceSeeder::class);
    }
}
