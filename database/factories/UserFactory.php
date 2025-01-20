<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'email' => $this->faker->unique()->safeEmail(),
            'role_id' => rand(1, 5), // Assuming roles have IDs between 1 and 5
            'name' => $this->faker->name(),
            'phone_nr' => $this->faker->phoneNumber(),
            'employee_id' => $this->faker->unique()->numerify('EMP-######'),
            'password' => bcrypt('password'), // Use bcrypt for hashed passwords
            'company_id' => rand(1, 100000), // Assuming companies have IDs between 1 and 100000
        ];
    }
}
