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

        $admin = new User;
	$admin->username = 'miketiido';
	$admin->password =  Hash::make('fakepass1');
	$admin->email = 'foo@bar.com';
	$admin->save();
    }

}