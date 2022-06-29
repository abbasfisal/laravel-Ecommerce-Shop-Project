<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->text(20);

        return [
            'category_id'       => Category::query()->where('parent_id' , '!=' , null)->get()
                                           ->random(),

            'brand_id'          => Brand::all()
                                        ->random(),
            'title'             => $title,
            'slug'              => SLUG($title),
            'price'             => rand(1000, 4000),
            'on_sale'           => null,
            'started_at'        => null,
            'end_at'            => null,
            'image'             => 'productCover-19829c8205c9dd8a47766c197f776601-62bc0116e11dc.jpg',
            'short_description' => $this->faker->text(100),
            'long_description'  => $this->faker->text(300),
            'note'              => $this->faker->text(10),
            'active'            => true,
            'stock'             => rand(4, 30)
        ];
    }
}
