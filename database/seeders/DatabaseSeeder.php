<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Company;
use App\Models\ConditionPayment;
use App\Models\FormPayment;
use App\Models\Product;
use App\Models\Seller;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Company::factory(1)->create();
        Seller::factory(10)->create();
        Client::factory(50)->create();
        Product::factory(50)->create();
        FormPayment::factory('5')->create();
        ConditionPayment::factory('5')->create();
    }
}
