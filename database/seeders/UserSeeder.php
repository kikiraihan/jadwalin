<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $u=new User;
        $u->username="admin";
        $u->email="admin@gmail.com";
        $u->password="password";
        $u->save();
    }
}
