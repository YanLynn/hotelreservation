<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
class CreateManagerUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Manager', 
            'email' => 'manager@gmail.com',
            'username' => 'Manager',
            'password' => 'manager123'
        ]);
    
        $role = Role::create(['name' => 'Manager']);
     
        $permissions = Permission::whereIn('id',[1,4,5,6,7,14,15,16,17,18,19,20])->pluck('id');
   
        $role->syncPermissions($permissions);
     
        $user->assignRole([$role->id]);
    }
}
