<?php

namespace Database\Factories;

use App\Models\MailAttribute;
use Illuminate\Database\Eloquent\Factories\Factory;

class MailAttributeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MailAttribute::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type' => $this->faker->type(),
        ];
    }
}
