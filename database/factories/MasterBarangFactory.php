<?php

namespace Database\Factories;

use App\Models\MasterBarang;
use Illuminate\Database\Eloquent\Factories\Factory;

class MasterBarangFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MasterBarang::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kode_barang' => $this->faker->numberBetween(1000, 9999),
            'nama_barang' => $this->faker->name(),
            'harga_jual' => $this->faker->numberBetween(10000, 20000),
            'harga_beli' => $this->faker->numberBetween(1000, 9000),
            'stok' => $this->faker->randomDigit(),
            'kategori_id' => $this->faker->randomElement($array = array (1, 2))
        ];
    }
}
