<?php

namespace Database\Factories;

use App\Models\master_unit;
use Illuminate\Database\Eloquent\Factories\Factory;

class master_unitFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = master_unit::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_satuan' => $this->faker->word,
        'singkatan_satuan' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
