<?php

namespace Database\Factories;

use App\Models\MasterTransactionCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class MasterTransactionCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MasterTransactionCategory::class;

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
