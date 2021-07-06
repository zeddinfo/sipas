<?php

namespace Database\Factories;

use App\Models\MailVersion;
use Illuminate\Database\Eloquent\Factories\Factory;

class MailVersionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MailVersion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'mail_id' => $this->faker->mail_id(),
            'file_id' => $this->faker->file_id(),
        ];
    }
}
