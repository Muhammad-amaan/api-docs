<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Sport;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('SportTableSeeder');
    }
}


class SportTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('sports')->delete();
        Sport::create(['title' => 'Soccer', 'icon' => 'pin_football']);
        Sport::create(['title' => 'Tennis', 'icon' => 'pin_tannies']);
        Sport::create(['title' => 'Hockey', 'icon' => 'ic_hockeywhite']);
        Sport::create(['title' => 'IceHockey', 'icon' => 'ic_ice_hockeywhite']);
        Sport::create(['title' => 'Basketball', 'icon' => 'ic_basketballwhite']);
        Sport::create(['title' => 'Handball', 'icon' => 'ic_handballwhite']);
        Sport::create(['title' => 'Softball', 'icon' => 'ic_softballwhite']);
        Sport::create(['title' => 'Baseball', 'icon' => 'ic_baseballwhite']);
        Sport::create(['title' => 'Ultimate', 'icon' => 'ic_frisbeewhite']);
    }
}
