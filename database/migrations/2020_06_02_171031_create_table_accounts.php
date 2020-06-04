<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAccounts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->integer('TuitionFee');//ค่าเทอม
            $table->integer('Other');//ค่าอื่น
            $table->integer('Duration');//ระยะเวลากู้
            $table->integer('cost_living');
            $table->string('details');
            // $table->integer('total');
            $table->integer('profile_id');
            $table->integer('type_id');
            $table->string('SendDocuments_id');
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
        Schema::dropIfExists('accounts');
    }
}
