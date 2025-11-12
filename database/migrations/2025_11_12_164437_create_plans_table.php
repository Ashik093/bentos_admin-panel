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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // e.g. Basic, Standard, Gold
            $table->string('subtitle')->nullable(); // e.g. "Have design ready to build?"
            $table->decimal('price', 8, 2)->default(0); // hourly rate
            $table->string('per')->default('hour'); // hour, project, etc.
            $table->json('features')->nullable(); // store features as JSON array
            $table->boolean('is_popular')->default(false); // highlight a plan
            $table->string('button_label')->nullable(); // e.g. "Order Now"
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
        Schema::dropIfExists('plans');
    }
};
