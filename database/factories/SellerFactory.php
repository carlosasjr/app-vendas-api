<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SellerFactory extends Factory
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
            'company_id' => $company_id,
            'uuid'      => Str::uuid(),
            'name' => $this->faker->firstName(),
            'password'  => '123',
        ];
    }
}
