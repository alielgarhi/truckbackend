<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PassportClientsSeeder extends Seeder
{
    public function run()
    {
        DB::table('oauth_clients')->insert([
            [
                'id' => 1,
                'name' => 'Personal Access Client',
                'secret' => 'secret1',
                'redirect' => 'http://localhost',
                'personal_access_client' => 1,
                'password_client' => 0,
                'revoked' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Password Grant Client',
                'secret' => 'secret2',
                'redirect' => 'http://localhost',
                'personal_access_client' => 0,
                'password_client' => 1,
                'revoked' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
