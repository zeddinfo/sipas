<?php

namespace Database\Factories;

use App\Models\MailTransaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class MailTransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MailTransaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'mail_version_id' => $this->faker->mail_version_id(),
            'user_id' => $this->faker->user_id(),
            'target_user_id' => $this->faker->target_user_id(),
        ];
    }
}
