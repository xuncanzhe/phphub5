<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $password = bcrypt('secret');
        $users = factory(User::class)->times(2)->make()->each(function ($user, $i) use ($password)  {
            if ($i == 0) {
                $user->name = 'admin';
                $user->email = env("ADMIN_EMAIL");
                $user->github_name = 'admin';
                $user->verified = 1;
            }elseif($i == 1)
            {
                $user->name = 'test_user';
                $user->email = 'user@hiworld-tec.com';
                $user->github_name = 'test';
                $user->verified = 1;
            }
            $user->password = $password;
            $user->github_id = $i + 1;
        });

        User::insert($users->toArray());

        $hall_of_fame = Role::addRole('HallOfFame', '名人堂');
        $users = User::all();
        foreach ($users as $key => $user) {
            $user->attachRole($hall_of_fame);
        }

    }
}
