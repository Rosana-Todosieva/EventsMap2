<?php


namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(){
        $user = new User([
            'name' => 'Creator',
            'email' => 'creator@gmail.com',
            'password' => 'creator123',
            'phone' => '072639522',
        ]);
        $user->save();
    }
}
