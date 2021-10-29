<?php

use Illuminate\Database\Seeder;
use App\Models\Cathegory;
use Illuminate\Support\Str;

class CathegoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cathegories = [['name' => 'HTML', 'color' => 'danger'], ['name' => 'CSS', 'color' => 'warning'], ['name' => 'JS', 'color' => 'primary'], ['name' => 'PHP', 'color' => 'secondary'], ['name' => 'VueJS', 'color' => 'success'], ['name' => 'Laravel', 'color' => 'info']];

        foreach($cathegories as $cathegory) {
            $new_cathegory = new Cathegory();

            $new_cathegory->name = $cathegory['name'];
            $new_cathegory->slug = Str::slug($cathegory['name'], '-');

            $new_cathegory->save();
        }
    }
}
