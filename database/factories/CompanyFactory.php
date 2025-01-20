<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CompanyFactory extends Factory
{
    /**
     * The name of the corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            'address' => $this->faker->address(),
            'cvr' => $this->faker->unique()->numerify('########'),
            'b2b' => $this->faker->boolean(),
            'b2c' => $this->faker->boolean(),
            'type_id' => rand(1, 5), // Assuming type IDs between 1 and 5
            'is_company' => true,
            'branch_code' => $this->faker->bothify('BR-#####'),
            'slug' => Str::slug($this->faker->company()),
        ];
    }
}
