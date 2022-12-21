<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CourseBooking>
 */
class CourseBookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = Faker::create('en_EN');
        $status = $faker->randomElement(['pending', 'ongoing', 'complete', 'canceled']);
        $faker = Faker::create('en_EN');
        $getCourse = $faker->randomElement(Course::all()->pluck('id'));

        if (Course::find($getCourse)->is_online == 1) {
            $location = Course::find($getCourse)->location;
        } else {
            if (Course::find($getCourse)->is_visit == 1) {
                $location = '';
            } else {
                $location = Course::find($getCourse)->location;
            }
        }

        return [
            'course_id' => $getCourse,
            'status' => $status,
            'member_sum' => Course::find($getCourse)->maximum_member - 2,
            'location' => $location,
        ];
    }
}
