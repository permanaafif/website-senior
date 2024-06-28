<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
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

        $default_user_value =[
            'email_verified_at' => now(),
            'password' =>  bcrypt('password'), // password
            'remember_token' => Str::random(10),
        ];

        $admin = User::create(array_merge([
            'nama' => 'admin',
            'nip' => '2001092001',
            'email' => 'admin@gmail.com',
            // 'role_id' => 

        ], $default_user_value));
        $admin->assignRole('admin');



        $dosen = User::create(array_merge([
            'nama' => 'dosen',
            'nip' => '2001092002',
            'email' => 'dosen@gmail.com',
            'role_id'=> 2
        ], $default_user_value));


        // $kaprodi = User::create(array_merge([
        //     'username' => 'kaprodi',
        //     'nip' => '2001092003',
        //     'email' => 'kaprodi@gmail.com',
        //     'role_id'=> 3
        // ], $default_user_value));

        // $kaprodi->assignRole('kaprodi');
    }
}
