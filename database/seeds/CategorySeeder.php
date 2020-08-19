<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'title' => 'Uncategorized',
                'slug' => 'uncategorized'
            ],
            [
                'title' => 'Web Design',
                'slug' => 'web-design'
            ],
            [
                'title' => 'Tips and Tricks',
                'slug' => 'tips-and-tricks'
            ],
            [
                'title' => 'Desain Asnimasi',
                'slug' => 'desain-animasi'
            ],
            [
                'title' => 'Pendidikan',
                'slug' => 'pendidikan'
            ],
        ]);
    }
}
