<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('name');
            $table->string('phone_number');
            $table->string('resiver_name');
            $table->string('resiver_number');
            $table->decimal('commission', 8, 2);
            $table->decimal('total', 8, 2);
            $table->string('location');
            $table->foreign('location')->references('area')->on('locations')->onDelete('CASCADE');
            $table->string('status')->nullable(); //will be addedd late on 
            $table->string('value_status')->nullable();
            $table->string('reason')->nullable();
            $table->string('note')->nullable();
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
        Schema::dropIfExists('transactions');
    }
}
