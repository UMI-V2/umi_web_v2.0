<?php

namespace Database\Factories;

use App\Models\ShippingUsed;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShippingUsedFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ShippingUsed::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_shipping_cost_variable' => $this->faker->randomDigitNotNull,
        'id_business_delivery_services' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
