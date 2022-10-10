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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string("fullname", 150);
            $table->string("email", 150);
            $table->string("mobile", 15);
            $table->string("city", 75);
            $table->string("gender", 10);
            $table->string("department", 75);
            $table->date("hire_date");
            $table->tinyInteger("permanent");
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
        Schema::dropIfExists('employees');
    }
};
