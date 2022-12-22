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
        $is_online = random_int(0, 1);
        $is_visit = 0;

        if ($is_online == 1) {
            $is_visit = 0;
            $location = $faker->url();
        } else {
            $is_visit = random_int(0, 1);
            if ($is_visit == 1) {
                $location = null;
            } else {
                $location = $faker2->address();
            }
        }

        $tool_price = $faker->randomElement([0, 20000, 300000, 250000, 40000, 25000]);
        $price_sum = $tool_price + random_int(20000, 500000);

        return [
            'skill_id' => $faker->randomElement(Skill::all()->pluck('id')),
            'description' => 'Asah dan kembangkan melalui kursus ini!',
            'location' => $location,
            'is_online' => $is_online,
            'is_visit' => $is_visit,
            'maximum_member' => random_int(3, 20),
            'tool_price' => $tool_price,
            'tool_description' => 'Peralatan terkait untuk menunjang kebutuhan murid',
            'start_time' => '09:00',
            'day' => $faker->randomElement(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu']),
            'price_sum' => $price_sum,
            'hour_sum' => random_int(1, 10),
        ];
    }
}
