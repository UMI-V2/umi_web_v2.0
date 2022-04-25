<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_usaha' => $this->faker->randomDigitNotNull,
        'id_satuan' => $this->faker->randomDigitNotNull,
        'nama' => $this->faker->word,
        'deskripsi' => $this->faker->word,
        'harga' => $this->faker->word,
        'stok' => $this->faker->randomDigitNotNull,
        'kondisi' => $this->faker->word,
        'preorder' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
