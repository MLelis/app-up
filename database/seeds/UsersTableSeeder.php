<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'name'=>'Administrator',
            'email'=>'admin',
            'password'=>'$2y$10$TeA8WFKTNeR6D06dlTVToerzJGf3JoJase6HDdKPVLXrCbRTWHIgu',
            'remember_token'=>'W8qY8G2ICQ7d2g53vttZttlmpSLgAgEPHorLROl7ifoBEaYz8NaQjdWXV7ys',
            'created_at'=>date('Y-m-d H:m:i'),
            'updated_at'=>date('Y-m-d H:m:i')
        ];
        DB::table('users')->insert($data);
    }
}
