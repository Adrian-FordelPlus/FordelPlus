<?php

namespace Database\Factories;

use App\Models\Offer;
use App\Models\Company;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OfferFactory extends Factory
{
    protected $model = Offer::class;

    public function definition()
    {
        return [
            'offer_code' => $this->faker->unique()->bothify('OFF-####'),
            'offer_link' => $this->faker->url(),
            'company_id' => Company::factory(),
            'category_id' => Category::factory(),
            'description' => $this->faker->sentence(),
            'image_link' => $this->faker->imageUrl(),
            'quantity' => $this->faker->numberBetween(1, 100),
            'expiration_date' => $this->faker->dateTimeBetween('+1 week', '+1 month'),
            'slug' => Str::slug($this->faker->unique()->word()),
        ];
    }
}
