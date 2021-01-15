<?php

use Illuminate\Database\Seeder;

class IdeaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = App\User::all();

        factory(App\Models\Idea::class, 300)->make()->each(function($idea) use ($users){
            $idea->user_id = $users->random()->id;
            $idea->categorie_id = rand(1,2);
            $idea->save();
        });
    }
}
