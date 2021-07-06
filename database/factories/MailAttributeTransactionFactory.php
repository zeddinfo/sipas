<?php

namespace Database\Factories;

use App\Models\MailAttributeTransaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class MailAttributeTransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MailAttributeTransaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'mail_id' => $this->faker->mail_id(),
            'mail_attribute_id' => $this->faker->mail_attribute_id(),
            'type' => $this->faker->type(),
        ];
    }
}
