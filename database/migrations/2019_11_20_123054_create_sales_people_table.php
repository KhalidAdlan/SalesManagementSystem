<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_people', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fullName');
            $table->string('userName');
            $table->string('area');
            $table->decimal('target', 15, 2)->default(0);
            $table->decimal('salary', 15, 2)->default(0);
            $table->decimal('commissionTargetNotReached', 15, 2)->default(0);
            $table->decimal('commissionTargetReached', 15, 2)->default(0);
            $table->decimal('commissionTargetExceeded', 15, 2)->default(0);
            $table->softDeletes();

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
        Schema::dropIfExists('sales_people');
    }
}
