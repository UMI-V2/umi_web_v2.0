<?php

namespace Database\Factories;

use App\Models\BusinessFile;
use Illuminate\Database\Eloquent\Factories\Factory;

class BusinessFileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BusinessFile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_usaha' => $this->faker->randomDigitNotNull,
        'file' => $this->faker->word,
        'is_video' => $this->faker->word,
        'is_photo' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
