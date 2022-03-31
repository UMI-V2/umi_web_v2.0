<?php

namespace Database\Factories;

use App\Models\ProductFile;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductFile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_produk' => $this->faker->randomDigitNotNull,
        'file' => $this->faker->word,
        'video' => $this->faker->word,
        'photo' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
