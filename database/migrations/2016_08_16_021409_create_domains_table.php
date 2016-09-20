<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDomainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domains', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('domain_name')->unique();
            $table->string('domain_register');
            $table->string('domian_style');
            $table->string('groupname');
            $table->string('domain_price');
            $table->string('domain_status');
            $table->string('beian_status');
            $table->string('domain_use');
            $table->dateTime('dead_time');
            $table->string('team_content');
            $table->integer('team_id')->unsigned();
            $table->integer('last_user_id')->unsigned();
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
        Schema::drop('domains');
    }
}
