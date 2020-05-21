<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Generator as Faker;
use Carbon\Carbon;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 15; $i++) {
            $post = new Post;
            $now = Carbon::now()->format('Y-m-d-H-m-s');
            $post->title = $faker->sentence(5, true);
            $post->author = $faker->name();
            $post->img = 'https://picsum.photos/500';
            $post->body = $faker->text(300);
            $post->slug = Str::slug($post->title, '-') . $now;
            $post->published = rand(0,1);
            $post->save();
        }
    }
}
