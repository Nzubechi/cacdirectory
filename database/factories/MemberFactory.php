<?php

namespace Database\Factories;

use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;

class MemberFactory extends Factory
{
    protected $model = Member::class;

    public function definition(): array
    {
        // $age = $this->faker->numberBetween(18, 80);

        return [
            'first_name'     => $this->faker->firstName,
            'surname'        => $this->faker->lastName,
            'phone'          => $this->faker->phoneNumber,
            'email'          => $this->faker->unique()->safeEmail,
            'address'        => $this->faker->address,
            'home_address'   => $this->faker->streetAddress,
            'profession'     => $this->faker->jobTitle,
            'dob'            => $this->faker->dateTimeBetween('-80 years', '-18 years')->format('Y-m-d'),
            'group'          => $this->faker->randomElement(['Group A', 'Group B', 'Group C']),
        ];
    }
}
