<?php

namespace Database\Factories;

use App\Models\MasterBusinessCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class MasterBusinessCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MasterBusinessCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_kategori_usaha' => $this->faker->word,
        'status_kategori_usaha' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
