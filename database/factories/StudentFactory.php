<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_code' => fake()->countryCode(),
            'name' => fake()->name(),
            'gender' => fake()->randomElement([0, 1]),
            'image' => fake()->imageUrl(640, 480),
            'birthday' => fake()->date(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'address' => fake()->address(),
            'status' => fake()->randomElement([0, 1, 2]),
            'department_id' => fake()->randomElement([4, 8 , 9]),
            'deleted_at' => '',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
