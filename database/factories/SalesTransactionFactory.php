<?php

namespace Database\Factories;

use App\Models\SalesTransaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class SalesTransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SalesTransaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_user' => $this->faker->randomDigitNotNull,
        'id_usaha' => $this->faker->randomDigitNotNull,
        'id_metode_pembayaran' => $this->faker->randomDigitNotNull,
        'id_sales_delivery_service' => $this->faker->randomDigitNotNull,
        'is_ambil_di_toko' => $this->faker->word,
        'no_pemesanan' => $this->faker->word,
        'subtotal_produk' => $this->faker->randomDigitNotNull,
        'subtotal_ongkir' => $this->faker->randomDigitNotNull,
        'diskon' => $this->faker->randomDigitNotNull,
        'biaya_penanganan' => $this->faker->randomDigitNotNull,
        'link_pembayaran' => $this->faker->word,
        'total_pesanan' => $this->faker->randomDigitNotNull,
        'is_rating' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
