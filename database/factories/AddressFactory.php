<?php

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_users' => $this->faker->randomDigitNotNull,
        'province_id' => $this->faker->randomDigitNotNull,
        'id_kota' => $this->faker->randomDigitNotNull,
        'id_kecamatan' => $this->faker->randomDigitNotNull,
        'nama' => $this->faker->word,
        'no_hp' => $this->faker->word,
        'alamat_lengkap' => $this->faker->word,
        'patokan' => $this->faker->word,
        'is_alamat_utama' => $this->faker->word,
        'is_rumah' => $this->faker->word,
        'is_kantor' => $this->faker->word,
        'is_usaha' => $this->faker->word,
        'latitude' => $this->faker->word,
        'longitude' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
