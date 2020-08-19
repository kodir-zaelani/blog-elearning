<?php

use App\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create data user
        $faker = \Faker\Factory::create();
        $userCreate = User::create([
            'name'      => 'Kodir Zaelani',
            'slug'      => 'kodir-zaelani',
            'email'     => 'admin@zaelani.id',
            'email_verified_at' => now(),
            'password' => bcrypt('secret12'),
            'remember_token' => Str::random(10),
            'bio' => $faker->text(rand(50, 100))
        ]);

        //assign permission to role
        $role = Role::find(1);
        $permissions = Permission::all();

        $role->syncPermissions($permissions);

        //assign role with permission to user
        $user = User::find(1);
        $user->assignRole($role->name);
    }
}
