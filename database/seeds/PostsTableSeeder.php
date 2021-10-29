<?php

use App\Models\Cathegory;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    //* without faker
    /* public function run() {
    $posts = [
        ['title' => 'Consectetur adipiscing elit', 'content' => 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.'],
        ['title' => 'Sed do eiusmod tempor incididunt', 'content' => 'Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.'],
        ];

        foreach($posts as $post) {
            $newPost = new Post();
            
            $newPost->fill($post);
            $newPost->slug = Str::slug($newPost->title, '-');

            $newPost->save();
        };
    } */

    //* with faker
    public function run(Faker $faker)
    { 
        $cathegories_id = Cathegory::select('id')->pluck('id')->toArray();
        $user_ids = Cathegory::pluck('id')->toArray();

        for ($i = 0; $i < 50; $i++) {
            $post = new Post();

            $post->cathegory_id = Arr::random($cathegories_id);
            $post->title = $faker->text(50);
            $post->content = $faker->paragraphs(2, true);
            $post->image = $faker->imageUrl(250, 250);
            $post->slug = Str::slug($post->title, '-');

            $post->save();
        };
    }

}