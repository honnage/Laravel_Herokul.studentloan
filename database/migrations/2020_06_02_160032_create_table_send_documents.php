<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSendDocuments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('send_documents', function (Blueprint $table) {
            $table->id();
            $table->string('Student_ID');
            $table->string('academy'); //มหาลัย
            $table->string('faculty'); //คณะ
            $table->string('major'); //สาขา
            $table->string('year'); //ปี
            $table->string('school_year'); //ปีที่กู้
            $table->string('term'); //เทอม
            $table->string('recovery_status');//สถานะการกู้คืน
            $table->string('document_status');//สถานะเอกสาร
            $table->string('description');
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
        Schema::dropIfExists('send_documents');
    }
}
