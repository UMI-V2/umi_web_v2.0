<?php

namespace Database\Factories;

use App\Models\BusinessDeliveryService;
use Illuminate\Database\Eloquent\Factories\Factory;

class BusinessDeliveryServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BusinessDeliveryService::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_usaha' => $this->faker->randomDigitNotNull,
        'id_master_jasa_pengiriman' => $this->faker->randomDigitNotNull,
        'biaya' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
