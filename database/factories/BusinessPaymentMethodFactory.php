<?php

namespace Database\Factories;

use App\Models\BusinessPaymentMethod;
use Illuminate\Database\Eloquent\Factories\Factory;

class BusinessPaymentMethodFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BusinessPaymentMethod::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_usaha' => $this->faker->randomDigitNotNull,
        'id_metode_pembayaran' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
