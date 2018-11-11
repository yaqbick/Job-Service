<?php

use Illuminate\Database\Seeder;

class TradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $trades= array('budownictwo','programowanie','marketing','pozostałe');
        for($i=0;$i<sizeof($trades);$i++)
        {
        DB::table('trades')->insert([
            'name' => $trades[$i],
        ]);
        }
    }
}
