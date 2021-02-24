<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name'  => 'FedEx Mailbox',
            'email' => 'michael.figueroa.osv@fedex.com',
            'email_verified_at' => now(),
            'password'  => Hash::make('Fedex2020')
        ]);
    }
}
