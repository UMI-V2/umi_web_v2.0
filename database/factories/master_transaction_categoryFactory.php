<?php

namespace Database\Factories;

use App\Models\master_transaction_category;
use Illuminate\Database\Eloquent\Factories\Factory;

class master_transaction_categoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = master_transaction_category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_kategori_transaksi' => $this->faker->word,
        'deskripsi_kategori_transaksi' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
