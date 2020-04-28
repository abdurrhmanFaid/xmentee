<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        $this->call(PermissionsTableSeeder::class);
//        $this->call(RolesTableSeeder::class);
//        $this->call(ConnectRelationshipsSeeder::class);
//        $this->call('UsersTableSeeder');

        $this->call(BandTableSeeder::class);
        $this->call(UsersTableSeeder::class);

//        factory(\App\Models\Batch::class)->create(['band_id' => 1]);
//        factory(\App\Models\Category::class, 10)->create(['band_id' => 1]);
//        factory(\App\Models\User::class, 5)->create(['band_id' => 1]);
//        factory(\App\Models\Post::class, 50)->create(['category_id' => \App\Models\Category::all()->random()->id, 'user_id' => \App\Models\User::all()->random()->id]);
//        factory(\App\Models\Comment::class, 500)->create(['commentable_id' => \App\Models\Post::all()->random()->id, 'commentable_type' => 'App\Models\Post', 'user_id' => \App\Models\User::all()->random()->id]);
//
//        for($i=0; $i<=85000; $i++) {
//            \App\Models\Post::forceCreate([
//                'title' => 'sdafjkasdlkf jlasdkjf ;laskj f;lkajs f;lka js;fklj asd;lkfj ;alksdjf ',
//                'body' => 'sadklfhlaksdjfhlaksdjf;kajsdfl; ja;sldkf j;laksjd f;lkasj df;lkj asd;lfkj as;ldfk jsd;lkf',
//                'user_id' => 1,
//                'category_id' => 1,
//                'band_id' => 1,
//                'type' => 'question',
//            ]);
//        }
    }
}
