<?php
 
use Illuminate\Database\Seeder;
 
class UsersTableSeeder extends Seeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('users')->delete();
 
        $users = array(
            ['id' => 1, 'name' => 'Hina', 'email' => 'hnadir@seecs.edu', 'password' => bcrypt('hn'), 'role' => 'super'],
			['id' => 2, 'name' => 'Laraib', 'email' => 'lshakeel@seecs.edu', 'password' => bcrypt('ls'), 'role' => 'normal'],
			['id' => 3, 'name' => 'Sarah', 'email' => 'ssajid@seecs.edu', 'password' => bcrypt('ss'), 'role' => 'normal'],
            
        );
 
        // Uncomment the below to run the seeder
        DB::table('users')->insert($users);
    }
 
}
?>