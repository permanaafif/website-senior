<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;



class UserRolePermissionSeeder extends Seeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        // Permission::create(['name' =>'create-user']);
        // Permission::create(['name' =>'edit-user']);
        // Permission::create(['name' =>'delete-user']);
        // Permission::create(['name' =>'read-user']);

        // Permission::create(['name' =>'create-matakuliah']);
        // Permission::create(['name' =>'edit-matakuliah']);
        // Permission::create(['name' =>'delete-matakuliah']);
        // Permission::create(['name' =>'read-matakuliah']);

        // Role::create(['name'=>'admin']);
        // Role::create(['name'=>'dosen']);
        // Role::create(['name'=>'kaprodi']);

        // $roleAdmin = Role::findByName('admin');
        // $roleAdmin->givePermissionTo('create-user');
        // $roleAdmin->givePermissionTo('edit-user');
        // $roleAdmin->givePermissionTo('delete-user');
        // $roleAdmin->givePermissionTo('read-user');

        // $roleAdmin->givePermissionTo('create-matakuliah');
        // $roleAdmin->givePermissionTo('edit-matakuliah');
        // $roleAdmin->givePermissionTo('delete-matakuliah');


        // $roleDosen = Role::findByName('dosen');

        // $roleDosen->givePermissionTo('read-matakuliah');




        $default_user_value =[
            'email_verified_at' => now(),
            'password' =>  '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
        DB::beginTransaction();
        try{

            // $role_admin = Role::create(['name'=> 'admin']);
            // $role_dosen = Role::create(['name'=> 'dosen']);
            // $role_kaprodi = Role::create(['name'=> 'kaprodi']);
            // $admin = User::create(array_merge([
            //     'username' => fake()->name(),
            //     'nip' => fake()->unique()->numberBetween(10000000, 99999999),
            //     'email' => fake()->unique()->safeEmail(),
            // ], $default_user_value));

                 User::create(array_merge([
                    'nama' => 'admin',
                    'nip' => '2001092001',
                    'email' => 'admin@gmail.com',
                    'role'=> 'admin',

                ], $default_user_value));





            // $dosen = User::create(array_merge([
            //     'username' => 'dosen',
            //     'nip' => '2001092002',
            //     'email' =>'dosen@gmail.com',

            // ], $default_user_value));

            // $kaprodi = User::create(array_merge([
            //     'username' => 'user',
            //     'nip' => '2001092003',
            //     'email' => 'kaprodi@gmail.com ',

            // ], $default_user_value));

            // $permission = Permission::create(['name' =>'read user']);
            // $permission = Permission::create(['name'=>'create user']);
            // $permission = Permission::create(['name' =>'update user']);
            // $permission = Permission::create(['name'=>'delete user']);

            // $permission = Permission::create(['name' =>'read role']);
            // $permission = Permission::create(['name'=>'create role']);
            // $permission = Permission::create(['name' =>'update role']);
            // $permission = Permission::create(['name'=>'delete role']);

            // $role_admin->givePermissionTo('read user');
            // $role_admin->givePermissionTo('create role');
            // $role_admin->givePermissionTo('update role');
            // $role_admin->givePermissionTo('delete role');

            // $role_dosen->givePermissionTo('read role');
            // $role_dosen->givePermissionTo('create role');
            // $role_dosen->givePermissionTo('update role');
            // $role_dosen->givePermissionTo('delete role');

            // $role_kaprodi->givePermissionTo('read role');
            // $role_kaprodi->givePermissionTo('create role');
            // $role_kaprodi->givePermissionTo('update role');
            // $role_kaprodi->givePermissionTo('delete role');

            // $admin->assignRole('admin');
            // $dosen->assignRole('dosen');
            // $kaprodi->assignRole('kaprodi');

            DB::commit();

        }catch(\Throwable $th){
            // dd($th);


            DB::rollBack();


        }

    }
}
