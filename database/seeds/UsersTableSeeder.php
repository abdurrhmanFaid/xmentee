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
        $user = \App\Models\User::create([
            'name' => 'Abdurrahman Faid',
            'username' => 'abdurrahman',
            'email' => 'abdurrhmanfaid@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('hguhf lk hgkj1088'),
            'band_id' => $bandId = \App\Models\Band::whereSlug('squadrons')->first()->id,
            'messaging_id' => '969050102',
        ]);

        \Illuminate\Support\Facades\DB::table('band_owner')->insert([
            'band_id' => $bandId,
            'owner_id' => $user->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
