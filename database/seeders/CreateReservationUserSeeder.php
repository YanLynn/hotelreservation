<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
class CreateReservationUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Reservation', 
            'email' => 'reservation@gmail.com',
            'username' => 'Reservation',
            'password' => 'reservation123'
        ]);
    
        $role = Role::create(['name' => 'Reservation']);
     
        $permissions = Permission::whereIn('id',[1,4,5,6,14,15,16,17,18,19,20])->pluck('id');
   
        $role->syncPermissions($permissions);
     
        $user->assignRole([$role->id]);
    }
}
