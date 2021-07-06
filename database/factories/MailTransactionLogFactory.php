<?php

namespace Database\Factories;

use App\Models\MailTransactionLog;
use Illuminate\Database\Eloquent\Factories\Factory;

class MailTransactionLogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MailTransactionLog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'mail_transaction_id' => $this->faker->mail_transaction_id(),
            'log' => $this->faker->log(),
            'user_level_department' => $this->faker->user_level_department(),
            'user_name' => $this->faker->user_name(),
        ];
    }
}
