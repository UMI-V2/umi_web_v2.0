<?php

namespace Database\Factories;

use App\Models\MasterProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class MasterProductCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MasterProductCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_kategori_produk' => $this->faker->word,
        'status_kategori_produk' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
