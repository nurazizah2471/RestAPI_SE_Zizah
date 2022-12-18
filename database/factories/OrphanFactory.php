<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Orphan>
 */
class OrphanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = Faker::create('id_ID');
        $min = strtotime('47 years ago');
        $max = strtotime('18 years ago');

        $rand_time = mt_rand($min, $max);
        $rand_gender = $faker->randomElement(['Male', 'Female']);
        $birth_date = date('Y-m-d H:i:s', $rand_time);

        return [
            'name' => $rand_gender == 'Male' ? $faker->firstNameMale() : $faker->firstNameFemale(),
            'date_of_birth' => $birth_date,
            'gender' => $rand_gender,
            'note' => random_int(1, 2) == 1 ? 'Anak Disabilitas' : '',
        ];
    }
}
