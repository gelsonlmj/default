<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postal_codes', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id')->unsigned();
            $table->string('from_postcode', 8);
            $table->string('to_postcode', 8);
            $table->decimal('from_weight', 13, 2);
            $table->decimal('to_weight', 13, 2);
            $table->decimal('cost', 13, 2);
            $table->timestamps();
            $table->foreign('client_id')->references('id')->on('clients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('postal_code');
    }
};
