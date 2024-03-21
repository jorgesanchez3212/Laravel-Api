<?php

namespace Database\Factories;

use App\Models\Rol;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Permission>
 */
class PermissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //

            "rol_id" => 1,
            "type" => $this -> faker -> randomElement(['1','2', '3']),
            "namePermission" => $this -> faker -> randomElement(['Cookies','Ordena', 'Elem']),

        ];
    }
}
