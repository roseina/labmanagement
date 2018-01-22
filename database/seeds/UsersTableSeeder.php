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
       if(DB::table('users')->where('id',1)->where('username','admin')->first()==null){
        DB::table('users')->insert([

            [
              'id' => 1,
              'name'=>'Admin',
              'username'=>'admin',
              'email'=>'fragnance.rose1@gmail.com',
              'password'=> bcrypt('admin123'),
            ]
        ]);
      }
    }
}
