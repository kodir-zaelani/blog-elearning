<?php

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //  DB::table('tags')->truncate();

        $php = new Tag();
        $php->title = "Pemrograman";
        $php->slug = "pemrograman";
        $php->save();

        $php = new Tag();
        $php->title = "Sastra";
        $php->slug = "sastra";
        $php->save();
        
        $php = new Tag();
        $php->title = "PHP";
        $php->slug = "php";
        $php->save();

        $laravel = new Tag();
        $laravel->title = "Laravel";
        $laravel->slug = "laravel";
        $laravel->save();

        $symphony = new Tag();
        $symphony->title = "Symphony";
        $symphony->slug = "symphony";
        $symphony->save();

        $vue = new Tag();
        $vue->title = "Vue JS";
        $vue->slug = "vue-js";
        $vue->save();

        $vue = new Tag();
        $vue->title = "Pendidikan";
        $vue->slug = "pendidikan";
        $vue->save();

        $vue = new Tag();
        $vue->title = "Animasi";
        $vue->slug = "animasi";
        $vue->save();


    }
}
