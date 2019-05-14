<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipients', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('client_id')->unsigned();
            $table->string('name');
            $table->string('surname');
            $table->string('lastname');
            $table->string('phone');
            $table->string('full_address');
            $table->string('email');
            $table->string('nid');
            $table->string('nid_type');
            $table->string('bank_name');
            $table->string('account_number');

            $table->timestamps();
            $table->softDeletes();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipients');
    }
}
