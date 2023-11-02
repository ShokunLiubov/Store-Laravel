<?php

namespace Database\Factories;

use App\Enum\User\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Role>
 */
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {

        return [];
    }

    public static function createRoles(): void
    {
        foreach (Role::values() as $role) {
            self::new()->create([
                'role' => $role,
            ]);
        }
    }
}
