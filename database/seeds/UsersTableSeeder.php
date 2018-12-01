<?php

use Illuminate\Database\Seeder;
use MyControl\User;

class UsersTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $admin = new User();
    $admin->name = 'Admin';
    $admin->email = 'admin@admin.com';
    $admin->password = bcrypt('123456');
    $admin->save();

    $test = new User();
    $test->name = 'Test';
    $test->email = 'test@test.com';
    $test->password = bcrypt('123456');
    $test->save();
  }
}