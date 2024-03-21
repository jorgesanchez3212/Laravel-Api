<?php

namespace Database\Factories;

use App\Models\Rol;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Users>
 */
class UsersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "rol_id"=> 1,
            "name" => $this->faker->name(),
            "email" => $this->faker->email(),
            "city" => $this->faker->city(),
            "postalCode" => $this -> faker -> postcode()

        ];
    }
}
