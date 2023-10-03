<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // Define an array of days of the week
        $daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

        // Randomly select one or more days from the array
        $randomDays = $this->faker->randomElements($daysOfWeek, $this->faker->numberBetween(1, count($daysOfWeek)));

        return [
            'title' => $this->faker->word,
            'available_days' => implode(',', $randomDays),
            // Add more fields if needed
        ];
    }
}
