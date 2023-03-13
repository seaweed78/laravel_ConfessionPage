<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
       $randomimg=[
        'pp/pp-1.png',
        'pp/pp-2.png',
        'pp/pp-3.png',
        'pp/pp-4.png',
        'pp/pp-5.png',
        'pp/pp-6.png',
        'pp/pp-7.png',
        'pp/pp-8.png',
        'pp/pp-9.png',
        'pp/pp-10.png',
        'pp/pp-11.png',
        'pp/pp-12.png',
        'pp/pp-13.png',
        'pp/pp-14.png'
       ];
        return [
            'name' => $this->faker->unique()->name(),
            'username' => $this->faker->unique()->text(13),
            'email' => $this->faker->unique()->safeEmail(),
            'gender' => $this->faker->randomElement(['Male', 'Female', 'Other']),
            'age' => $this->faker->numberBetween(18, 90),
            'country' => $this->faker->randomElement(['Nepal', 'India', 'China', 'England', 'France', 'USA', 'UK', 'Austrailia','Japan', 'Belgium', 'Brazil']),
            'password' => Hash::make('12345678'),
            'img' =>$randomimg[rand(0,13)],

            'role' => $this->faker->numberBetween(0, 1),
        ];
    }
}