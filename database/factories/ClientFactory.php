<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->name;
        $company_id = Company::first()->id;
        return [
            'company_id'    => $company_id,
            'uuid'      => Str::uuid(),
            'name'      => $name,
            'fantasy'   => $name,
            'city'      => $this->faker->city(),
            'uf'        => 'SP'
        ];
    }
}
