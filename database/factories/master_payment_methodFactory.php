<?php

namespace Database\Factories;

use App\Models\master_payment_method;
use Illuminate\Database\Eloquent\Factories\Factory;

class master_payment_methodFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = master_payment_method::class;

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
