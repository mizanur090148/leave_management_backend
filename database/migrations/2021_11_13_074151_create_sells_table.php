<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sells', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_no', 20);
            $table->string('code', 12);
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->unsignedBigInteger('sub_category_id')->nullable();
            $table->double('unit_price', 12,4)->nullable();
            $table->integer('quantity')->nullable();
            $table->tinyInteger('status')->default(false);
            $table->unsignedBigInteger('factory_id')->nullable();
            $table->activitiesBy();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('sells')->onDelete('cascade');
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('cascade');
            $table->foreign('factory_id')->references('id')->on('factories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sells');
    }
}
