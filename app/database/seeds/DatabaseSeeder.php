<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
	    Eloquent::unguard();

	    $this->call('AdminSeeder');
	    
	    $this->command->info('Administrator added to the user table.');
	}

}

class AdminSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(array(
	    'username' => 'miketiido',
	    'password' => 'fakepass1',
	    'email' => 'foo@bar.com'
	));
    }

}