<?php

use Illuminate\Database\Seeder;
use App\Common;
use App\Custom_poll;

class CommonTableAddHelpTextSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cp = Custom_poll::where('name', 'second')->first();
        $common = Common::where('custom_poll_id', $cp->id)->first();

        $common->help_text = 'If you need some help from us, please contact info@bestarchitecturemasters.com';

		$common->save();
    }
}
