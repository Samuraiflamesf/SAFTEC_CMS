<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password = null;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'cpf' => fake()->numerify('###########'),
            'email' => fake()->unique()->safeEmail(),
            'date_birthday' => fake()->dateTimeInInterval('-30 years', '-10 years'),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'id_empresa' => null, // Pode ser definido depois
            'id_profession' => null, // Pode ser definido depois
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    /**
     * Define an admin user with specific email and password.
     */
    public function admin(): static
    {
        return $this->state(fn(array $attributes) => [
            'name' => 'admin',
            'cpf' => '06605000000',
            'email' => 'Admin@admin.com',
            'password' => Hash::make('123admin'),
        ]);
    }
}