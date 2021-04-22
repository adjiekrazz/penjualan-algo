<?php

namespace Database\Factories;

use App\Models\Konsumen;
use Illuminate\Database\Eloquent\Factories\Factory;

class KonsumenFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Model::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'nama_konsumen' => $this->faker->name(),
          'alamat' => $this->faker->address()
        ];
    }
}
