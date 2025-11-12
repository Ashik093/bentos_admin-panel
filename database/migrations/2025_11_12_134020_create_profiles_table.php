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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('role')->nullable(); // Example: Product Designer
            $table->string('short_description')->nullable(); // Example: I am a web designer...
            $table->string('long_description')->nullable(); // Example: I am a web designer...
            $table->text('bio')->nullable(); // Long description
            $table->string('location')->nullable(); // Example: San Francisco
            $table->string('profile_photo')->nullable(); // Image path
            $table->boolean('available_for_freelance')->default(false);
            $table->string('cv_file')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('x_link')->nullable();
            $table->string('linked_link')->nullable();
            $table->string('github_link')->nullable();
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
        Schema::dropIfExists('profiles');
    }
};
