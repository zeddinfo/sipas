<?php

namespace Database\Factories;

use App\Models\Mail;
use Illuminate\Database\Eloquent\Factories\Factory;

class MailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Mail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kind' => $this->faker->kind(),
            'directory_code' => $this->faker->directory_code(),
            'code' => $this->faker->code(),
            'title' => $this->faker->title(),
            'origin' => $this->faker->origin(),
        ];
    }
}
