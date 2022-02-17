<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $company_id = Company::first()->id;

        return [
            'company_id'    => $company_id,
            'uuid'          => Str::uuid(),
            'description'   => $this->faker->word,
            'price'         => 10.50,
            'min_price'     => 10.50,
            'stock'         => 100000
        ];
    }
}
