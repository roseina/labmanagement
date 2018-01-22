<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('organization_code')->unique()->nullable();
            $table->string('organization_name')->nullable();
            $table->string('country')->nullable();
            $table->string('district')->nullable();
            $table->string('zone')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('phone1')->nullable();
            $table->string('Phone 2')->nullable();
            $table->string('fax')->nullable();
            $table->string('image')->nullable();
            $table->string('logo')->nullable();
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
        Schema::dropIfExists('organizations');
    }
}
