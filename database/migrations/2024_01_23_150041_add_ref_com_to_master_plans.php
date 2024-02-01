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
        Schema::table('master_plans', function (Blueprint $table) {
            $table->integer('ref_com6')->default(0);
            $table->integer('ref_com7')->default(0);
            $table->integer('ref_com8')->default(0);
            $table->integer('ref_com9')->default(0);
            $table->integer('ref_com10')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('master_plans', function (Blueprint $table) {
            //
        });
    }
};
