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
        $cathegory_names = ['HTML', 'CSS', 'JS', 'PHP', 'VueJS', 'Laravel'];

        foreach($cathegory_names as $name) {
            $cathegory = new Cathegory();

            $cathegory->name = $name;
            $cathegory->slug = Str::slug($name, '-');

            $cathegory->save();
        }
    }
}
