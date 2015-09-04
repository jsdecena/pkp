<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();

        App\Models\Categories::create(['name' => 'Uncategorized', 'slug' => 'uncategorized', 'cover' => null, 'description' => null, 'status' => 1, 'parent_id' => 0, 'created_at' => date('m-d-y H:i:s'), 'updated_at' => date('m-d-y H:i:s')]);

        $this->command->info('Categories table seeded!');
    }
}
