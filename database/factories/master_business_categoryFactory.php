<?php

namespace Database\Factories;

use App\Models\master_business_category;
use Illuminate\Database\Eloquent\Factories\Factory;

class master_business_categoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = master_business_category::class;

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
