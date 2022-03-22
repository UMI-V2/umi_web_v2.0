<?php

namespace Database\Factories;

use App\Models\MasterPaymentMethod;
use Illuminate\Database\Eloquent\Factories\Factory;

class MasterPaymentMethodFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MasterPaymentMethod::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_metode_pembayaran' => $this->faker->word,
        'deskripsi_metode_pembayaran' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
