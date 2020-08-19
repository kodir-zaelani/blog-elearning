<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //permission for posts
         Permission::create(['name' => 'posts.index']);
         Permission::create(['name' => 'posts.create']);
         Permission::create(['name' => 'posts.edit']);
         Permission::create(['name' => 'posts.delete']);
 
         //permission for tags
         Permission::create(['name' => 'tags.index']);
         Permission::create(['name' => 'tags.create']);
         Permission::create(['name' => 'tags.edit']);
         Permission::create(['name' => 'tags.delete']);
 
         //permission for categories
         Permission::create(['name' => 'categories.index']);
         Permission::create(['name' => 'categories.create']);
         Permission::create(['name' => 'categories.edit']);
         Permission::create(['name' => 'categories.delete']);
 
         //permission for events
         Permission::create(['name' => 'events.index']);
         Permission::create(['name' => 'events.create']);
         Permission::create(['name' => 'events.edit']);
         Permission::create(['name' => 'events.delete']);
 
         //permission for photos
         Permission::create(['name' => 'photos.index']);
         Permission::create(['name' => 'photos.create']);
         Permission::create(['name' => 'photos.edit']);
         Permission::create(['name' => 'photos.delete']);
 
         //permission for videos
         Permission::create(['name' => 'videos.index']);
         Permission::create(['name' => 'videos.create']);
         Permission::create(['name' => 'videos.edit']);
         Permission::create(['name' => 'videos.delete']);
 
         //permission for sliders
         Permission::create(['name' => 'sliders.index']);
         Permission::create(['name' => 'sliders.create']);
         Permission::create(['name' => 'sliders.edit']);
         Permission::create(['name' => 'sliders.delete']);
 
         //permission for roles
         Permission::create(['name' => 'roles.index']);
         Permission::create(['name' => 'roles.create']);
         Permission::create(['name' => 'roles.edit']);
         Permission::create(['name' => 'roles.delete']);
 
         //permission for permissions
         Permission::create(['name' => 'permissions.index']);
         Permission::create(['name' => 'permissions.create']);
         Permission::create(['name' => 'permissions.edit']);
         Permission::create(['name' => 'permissions.delete']);
 
         //permission for users
         Permission::create(['name' => 'users.index']);
         Permission::create(['name' => 'users.create']);
         Permission::create(['name' => 'users.edit']);
         Permission::create(['name' => 'users.delete']);

         //permission for albums
         Permission::create(['name' => 'albums.index']);
         Permission::create(['name' => 'albums.create']);
         Permission::create(['name' => 'albums.edit']);
         Permission::create(['name' => 'albums.delete']);

         //permission for levelclasses
         Permission::create(['name' => 'levelclasses.index']);
         Permission::create(['name' => 'levelclasses.create']);
         Permission::create(['name' => 'levelclasses.edit']);
         Permission::create(['name' => 'levelclasses.delete']);

         //permission for instructurs
         Permission::create(['name' => 'instructurs.index']);
         Permission::create(['name' => 'instructurs.create']);
         Permission::create(['name' => 'instructurs.edit']);
         Permission::create(['name' => 'instructurs.delete']);

         //permission for courses
         Permission::create(['name' => 'courses.index']);
         Permission::create(['name' => 'courses.create']);
         Permission::create(['name' => 'courses.edit']);
         Permission::create(['name' => 'courses.delete']);

         //permission for screenshots
         Permission::create(['name' => 'screenshots.index']);
         Permission::create(['name' => 'screenshots.create']);
         Permission::create(['name' => 'screenshots.edit']);
         Permission::create(['name' => 'screenshots.delete']);

         //permission for tools
         Permission::create(['name' => 'tools.index']);
         Permission::create(['name' => 'tools.create']);
         Permission::create(['name' => 'tools.edit']);
         Permission::create(['name' => 'tools.delete']);

         //permission for sections
         Permission::create(['name' => 'sections.index']);
         Permission::create(['name' => 'sections.create']);
         Permission::create(['name' => 'sections.edit']);
         Permission::create(['name' => 'sections.delete']);

         //permission for lessons
         Permission::create(['name' => 'lessons.index']);
         Permission::create(['name' => 'lessons.create']);
         Permission::create(['name' => 'lessons.edit']);
         Permission::create(['name' => 'lessons.delete']);

         //permission for students
         Permission::create(['name' => 'students.index']);
         Permission::create(['name' => 'students.create']);
         Permission::create(['name' => 'students.edit']);
         Permission::create(['name' => 'students.delete']);

         //permission for courseusers
         Permission::create(['name' => 'courseusers.index']);
         Permission::create(['name' => 'courseusers.create']);
         Permission::create(['name' => 'courseusers.edit']);
         Permission::create(['name' => 'courseusers.delete']);

         //permission for lessoncompletes
         Permission::create(['name' => 'lessoncompletes.index']);
         Permission::create(['name' => 'lessoncompletes.create']);
         Permission::create(['name' => 'lessoncompletes.edit']);
         Permission::create(['name' => 'lessoncompletes.delete']);

         //permission for todotasks
         Permission::create(['name' => 'todotasks.index']);
         Permission::create(['name' => 'todotasks.create']);
         Permission::create(['name' => 'todotasks.edit']);
         Permission::create(['name' => 'todotasks.delete']);
    }
}
