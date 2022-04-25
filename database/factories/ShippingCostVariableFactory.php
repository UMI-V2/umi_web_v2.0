<?php

namespace Database\Factories;

use App\Models\ShippingCostVariable;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShippingCostVariableFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ShippingCostVariable::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_product' => $this->faker->randomDigitNotNull,
        'is_paid_by_seller' => $this->faker->word,
        'berat' => $this->faker->word,
        'lebar' => $this->faker->word,
        'panjang' => $this->faker->word,
        'tinggi' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
