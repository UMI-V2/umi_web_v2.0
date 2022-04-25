<?php

namespace Database\Factories;

use App\Models\OpenHour;
use Illuminate\Database\Eloquent\Factories\Factory;

class OpenHourFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OpenHour::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_usaha' => $this->faker->randomDigitNotNull,
        'senin' => $this->faker->word,
        'selasa' => $this->faker->word,
        'rabu' => $this->faker->word,
        'kamis' => $this->faker->word,
        'jumat' => $this->faker->word,
        'sabtu' => $this->faker->word,
        'minggu' => $this->faker->word
        ];
    }
}
