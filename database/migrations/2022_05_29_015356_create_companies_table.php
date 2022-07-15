<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();;
            $table->string('email')->unique();
            $table->string('mobile')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('avatar')->nullable();
            $table->text('bio')->nullable();
            $table->string('password')->nullable();
            $table->tinyInteger('status')->default('0');
            $table->rememberToken();
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
        Schema::dropIfExists('companies');
    }
}
