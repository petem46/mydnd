<?php

use Illuminate\Database\Seeder;

class RacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    DB::table('races')->insert(array(
        array(
          'name' => 'Dragonborn',
       ),
        array(
          'name' => 'Dwarf',
       ),
        array(
          'name' => 'Eladrin',
       ),
       array(
          'name' => 'Elf',
        ),
       array(
          'name' => 'Gnome',
        ),
       array(
          'name' => 'Half-elf',
        ),
       array(
          'name' => 'Half-orc',
        ),
       array(
          'name' => 'Halfing',
        ),
       array(
          'name' => 'Human',
        ),
       array(
          'name' => 'Tiefling',
        ),
      ));
    }
}
