<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {


        $title = $this->faker->word();
        return [

            'title' => $title,
            'slug'  => SLUG($title),
            'image' => 'brand-7cae51389a12d6c9c004354d1d27941f-62bbdfbf40371.jpg'

        ];
    }
}
