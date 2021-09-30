<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('news_id')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('author', 191);
            $table->string('title', 191);
            $table->text('description')->nullable();
            $table->enum('status', ['DRAFT', 'PUBLISHED', 'BLOCKED'])->default('DRAFT');
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
        Schema::dropIfExists('comments');
    }
}
