<?php

use Illuminate\Database\Seeder;
use App\PC;

class PCsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 48;
        factory(PC::class, $count)->create();
    }
}
