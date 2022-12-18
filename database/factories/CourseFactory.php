<?php

namespace Database\Factories;

use App\Models\Skill;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = Faker::create('en_EN');
        $faker2 = Faker::create('id_ID');

        return [
            'skill_id' => $faker->randomElement(Skill::all()->pluck('id')),
            'description' => 'Asah dan kembangkan melalui kursus ini!',
            'location' => $faker2->city(),
            'is_online' => random_int(0, 1),
            'is_visit' => random_int(0, 1),
            'maximum_member' => random_int(3, 20),
            'tool_price' => $faker->randomElement([0, 20000, 300000, 250000, 40000, 25000]),
            'tool_description' => 'Peralatan terkait untuk menunjang kebutuhan murid',
            'start_time' => '09:00',
            'day' => $faker->randomElement(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu']),
            'price_sum' => random_int(20000, 500000),
            'hour_sum' => random_int(1, 10),
        ];
    }
}