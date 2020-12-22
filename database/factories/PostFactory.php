<?php

namespace Database\Factories;

// Models
use App\Models\Category;
use App\Models\Post;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'         =>  $this->faker->sentence(4),
            'body'          =>  $this->faker->realText($maxNbChars = 200, $indexSize = 2),
            'published_at'  =>  Carbon::now(),
            'category_id'   =>  Category::factory()
        ];
    }

    // Generate Post Slug
    public function setSlug(Post $post)
    {
        $slug = Str::slug($post->title, '-');

        $post->slug = Str::slug($post->title, '-');
        $post->save();
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterMaking(function (Post $post) {
            $this->setSlug($post);
        })->afterCreating(function (Post $post) {
            $this->setSlug($post);
        });
    }
}
