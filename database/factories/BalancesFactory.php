<?php

namespace Database\Factories;

use App\Models\Balances;
use Illuminate\Database\Eloquent\Factories\Factory;

class BalancesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Balances::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_kategori_transaksi' => $this->faker->randomDigitNotNull,
        'id_transaksi_penjualan' => $this->faker->randomDigitNotNull,
        'pengeluaran' => $this->faker->randomDigitNotNull,
        'pemasukan' => $this->faker->randomDigitNotNull,
        'deskripsi' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
