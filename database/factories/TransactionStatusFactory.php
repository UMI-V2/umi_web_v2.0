<?php

namespace Database\Factories;

use App\Models\TransactionStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionStatusFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TransactionStatus::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_transaksi_penjualan' => $this->faker->randomDigitNotNull,
        'tanggal_pesanan_dibuat' => $this->faker->word,
        'tanggal_pembayaran' => $this->faker->word,
        'tanggal_pesanan_dikirimkan' => $this->faker->word,
        'tanggal_pesanan_diterima' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
