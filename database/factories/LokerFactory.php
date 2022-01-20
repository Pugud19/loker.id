<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

class LokerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=> User::factory(),
            'identifier'=> strtolower(Str::random(32)),
            'name'=> $this->faker->company(),
            'bagian'=> $this->faker->word(),
            'tempat'=> $this->faker->city(),
            'gaji'=> $this->faker->randomNumber(),
            'pengalaman'=> $this->faker->randomDigit(),
        ];
    }
}
