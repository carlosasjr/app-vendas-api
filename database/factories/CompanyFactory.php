<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'  => $this->faker->name,
            'cnpj'  => '06.155.474/0001-99',
            'license'   => '1000',
            'license_used'  => '0'
        ];
    }
}
