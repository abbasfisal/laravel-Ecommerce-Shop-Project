<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->words;

        return [

            Category::c_title     => $title,
            Category::c_slug      => SLUG($title)

        ];
    }


    public function sub()
    {
        return $this->state(function (array $attributes) {
            return [
                Category::c_parent_id => Category::factory(),
            ];
        });
    }

}
