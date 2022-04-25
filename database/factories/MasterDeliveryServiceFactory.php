<?php

namespace Database\Factories;

use App\Models\MasterDeliveryService;
use Illuminate\Database\Eloquent\Factories\Factory;

class MasterDeliveryServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MasterDeliveryService::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_jasa_pengiriman' => $this->faker->word,
        'is_set_seller' => $this->faker->word,
        'deskripsi' => $this->faker->word,
        'kode_rajaongkir' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
