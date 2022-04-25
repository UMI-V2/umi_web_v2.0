<?php

namespace Database\Factories;

use App\Models\TransactionProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TransactionProduct::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_transaksi_penjualan' => $this->faker->randomDigitNotNull,
        'id_produk' => $this->faker->randomDigitNotNull,
        'harga_produk' => $this->faker->randomDigitNotNull,
        'harga_diskon' => $this->faker->randomDigitNotNull,
        'deskripsi_produk' => $this->faker->word,
        'kondisi' => $this->faker->word,
        'preorder' => $this->faker->word,
        'ongkir' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
