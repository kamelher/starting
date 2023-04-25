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
        Schema::table('mail_register', function (Blueprint $table) {
            //
            $table->string('reference_number')->nullable();
            $table->boolean('response_needed')->default(false);
            $table->timestamp('response_deadline')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('to_mail_register', function (Blueprint $table) {
            $table->removeColumn('reference_number');
            $table->removeColumn('response_needed');
            $table->removeColumn('response_deadline');
            //
        });
    }
};
