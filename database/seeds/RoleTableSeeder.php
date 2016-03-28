<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();
        Role::create(['name' => 'admin']);
        $admin = Role::find(1);
        $user = User::find(27);
        $user->roles()->attach($admin->id); 
    }

}
