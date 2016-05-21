<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        $users_json = File::get('database/data/Tab-User.json');
        $users = json_decode($users_json);
        foreach ($users as $user) {
        	User::create([
        		'userId'		=> $user->userId_crawled,
        		'userName'		=> $user->userName,
        		'prefGender'	=> $user->prefGender,
        		'prefBrands'	=> $user->prefBrands,
                'role_id'       => 2
        	]);
        }

        User::create([
        	'userId'	=> str_random(16),
        	'userName'	=> 'admin',
        	'password'  => bcrypt('admin'),
            'role_id'   => 1
        ]);
    }
}
