<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained();
            $table->uuid('uuid');
            $table->string('code_erp')->nullable();
            $table->string('description')->nullable();
            $table->decimal('price', 15, 4)->nullable();
            $table->decimal('min_price', 15, 4)->nullable();
            $table->decimal('stock', 15, 4)->nullable();
            $table->boolean('inative')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
