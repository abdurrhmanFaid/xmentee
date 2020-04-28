<?php

use Illuminate\Database\Seeder;

class BandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Band::create([
            'name' => 'Stacks',
            'slug' => 'stacks',
            'description' => 'Focused on all aspects of cloud computing. Industry experiences, business models, legal aspects, research, development and other innovations in cloud computing.',
            'address' => 'Netherlands, Alphen a/d Rijn',
            'applying_deadline' => now()->addDays(14),
            'created_at' => now()->subDays(2),
            'members_count' => 11,
            'student_reception_open' => true,
        ]);

        \App\Models\Band::create([
            'name' => 'ITManagers',
            'slug' => 'it-managers',
            'description' => 'Discussions touch on trends in the industry, include mobile device management techniques, how c-suite can create a big data culture and the power of teamwork. and a variety of strategies and leadership methods.',
            'address' => 'Netherlands',
            'applying_deadline' => now()->addDays(30),
            'created_at' => now()->subDays(3),
            'members_count' => 9,
            'student_reception_open' => true,
        ]);

        $band = \App\Models\Band::create([
            'name' => 'SQUADRONS',
            'slug' => 'squadrons',
            'description' => 'Let\'s do it in fast, committed, and organized way !',
            'address' => 'Egypt',
            'applying_deadline' => "2020-01-20 23:59:59",
            'members_count' => 0,
            'student_reception_open' => true,
        ]);

        // generate instructor ticket
        $instructorTicket = \App\Models\Ticket::create([
            'code' => \Str::slug($band->name . ' Instructor'),
            'password' => 'squadrons.i',
            'band_id' => $band->id,
            'type' => 'instructor',
            'owner_name' => \Str::slug($band->name) . ' Instructor',
            'status' => 'approved',
            'unlimited_usage' => true,
            'distributed_by_band' => false,
        ]);

        $studentTicket = \App\Models\Ticket::create([
            'code' => \Str::slug($band->name . ' Student'),
            'password' => 'squadrons.s',
            'band_id' => $band->id,
            'type' => 'student',
            'owner_name' => $band->name . " " . "Student",
            'status' => 'approved',
            'unlimited_usage' => false,
            'usage_limit' => 0,
            'distributed_by_band' => true,
        ]);

        $batch = $band->batches()->create([
            'name' => 'Egypt Batch',
            'slug' => 'egypt-batch',
        ]);

        $band->update(['receiving_batch_id' => $batch->id]);

        $band->categories()->create([
            'name' => 'Web Development',
            'slug' => $band->slug . '-web-dev',
            'description' => '
            Learn how to make a really creative, advanced real world web applications.
            ',
        ]);

        $band->categories()->create([
            'name' => 'Mobile Development',
            'slug' => $band->slug . '-mobile-dev',
            'description' => '
            Learn how to create a real world mobile apps. Focusing on the most popular systems [Android, IOS] and the new one [Google Fuchsia]',
        ]);

        $band->categories()->create([
            'name' => 'Desktop Development',
            'slug' => $band->slug . '-desktop-dev',
            'description' =>
                'It\'s not that old. Don\'t forget antivirus, Photoshop, VS Code, more. Some apps need to be very big. They won’t fit on a mobile and they won’t work well over the Internet, esp. with busy servers.',
        ]);

        $band->categories()->create([
            'name' => 'Software Engineering',
            'slug' => $band->slug . '-software-engineering',
            'description' =>
                'Learn Data structures, Algorithams, Operating Systems, Design patterns, theoretical computer science',
        ]);


        $band->categories()->create([
            'name' => 'English Language',
            'slug' => $band->slug . '-english-lang',
            'description' => 'Be fluent in english in nine Months.',
        ]);

        $band->categories()->create([
            'name' => 'Marketing',
            'slug' => $band->slug . '-marketing',
            'description' => 'Important Marketing skills.',
        ]);

        $band->categories()->create([
            'name' => 'Soft skills',
            'slug' => $band->slug . '-soft-skills',
            'description' => 'Highly-developed soft skills, networking abilities, and etiquette awareness can help you win new clients and gain more work from existing clients. We will not escape this.',
        ]);

        $band->categories()->create([
            'name' => 'Penetration testing',
            'slug' => $band->slug . '-pentest',
            'description' => '
               The most interesting path for me and for most of you I think.',
        ]);

        $band->categories()->create([
            'name' => 'Other',
            'slug' => $band->slug . 'other',
        ]);

//
//        $data = [
//            'title' => 'fake title',
//            'body' => 'fake post body',
//            'user_id' => 1,
//            'band_id' => 1,
//            'category_id' => 1,
//            'type' => array_random(['question', 'advice', 'other']),
//        ];
//
//        foreach(range(0, 300000) as $n) {
//            \App\Models\Post::forceCreate($data);
//        }

    }
}
