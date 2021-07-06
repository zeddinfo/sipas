<?php

namespace Database\Factories;

use App\Models\MailTransactionCorrection;
use Illuminate\Database\Eloquent\Factories\Factory;

class MailTransactionCorrectionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MailTransactionCorrection::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'mail_transaction_id' => $this->faker->mail_transaction_id(),
            'note' => $this->faker->note(),
            'file_id' => $this->faker->file_id(),
        ];
    }
}
