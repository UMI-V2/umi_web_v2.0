<?php

namespace Database\Factories;

use App\Models\SalesDeliveryService;
use Illuminate\Database\Eloquent\Factories\Factory;

class SalesDeliveryServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SalesDeliveryService::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_jasa_pengiriman' => $this->faker->randomDigitNotNull,
        'jenis_layanan' => $this->faker->word,
        'deskripsi_layanan' => $this->faker->word,
        'ongkir' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
