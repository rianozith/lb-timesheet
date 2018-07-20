<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
        	'name' => 'Experimental',
        	'parent_id' => 1,
        ]);

        Category::create([
        	'name' => 'Side by Side',
        	'parent_id' => 2,
        ]);

        $this->command->info('berhasil menambahkan category');
    }
}
