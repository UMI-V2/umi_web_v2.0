<?php

namespace Database\Factories;

use App\Models\SubDistrict;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubDistrictFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SubDistrict::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'province_id' => $this->faker->randomDigitNotNull,
        'id_kota' => $this->faker->randomDigitNotNull,
        'subdistrict_name' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
