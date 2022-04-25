<?php

namespace Database\Factories;

use App\Models\Discount;
use Illuminate\Database\Eloquent\Factories\Factory;

class DiscountFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Discount::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_produk' => $this->faker->randomDigitNotNull,
        'nama_promo' => $this->faker->word,
        'waktu_mulai' => $this->faker->word,
        'waktu_berakhir' => $this->faker->word,
        'harga' => $this->faker->randomDigitNotNull,
        'batas_pembelian' => $this->faker->randomDigitNotNull,
        'type' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
