<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            "id"=>Uuid::uuid4()->getHex(),
            "name"=>"Super Admin",
            "email"=>"super_admin@gmail.com",
            "password"=> bcrypt("super_admin"),
            "role"=>"admin"
        ]);

        User::create([
            "id"=>Uuid::uuid4()->getHex(),
            "name"=>"Wadir",
            "email"=>"wadir@gmail.com",
            "password"=> bcrypt("wadir"),
            "role"=>"wadir"
        ]);

        User::create([
            "id"=>Uuid::uuid4()->getHex(),
            "name"=>"HIMATIF",
            "email"=>"himatif@gmail.com",
            "password"=> bcrypt("ormawa"),
            "role"=>"ormawa"
        ]);

    }
}
