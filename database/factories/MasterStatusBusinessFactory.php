<?php

namespace Database\Factories;

use App\Models\MasterStatusBusiness;
use Illuminate\Database\Eloquent\Factories\Factory;

class MasterStatusBusinessFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MasterStatusBusiness::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_status_usaha' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
