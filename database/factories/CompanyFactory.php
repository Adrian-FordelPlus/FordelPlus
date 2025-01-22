<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\CompanyType;

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
            'type_id' => CompanyType::inRandomOrder()->first()->id,
            'is_company' => true,
            'branch_code' => $this->faker->bothify('BR-#####'),
            'slug' => Str::slug($this->faker->company()),
        ];
    }
}
