<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name');
            $table->string('prix');
            $table->foreignId('categorie_id')->constrained('categories');
            $table->foreignId('log_creation')->nullable()->constrained('logs');
            $table->foreignId('latest_log_modification')->nullable()->constrained('logs');
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
        Schema::dropIfExists('articles');
    }
}
