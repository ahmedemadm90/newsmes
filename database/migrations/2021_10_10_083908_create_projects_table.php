<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('no action');
            $table->string('title');
            $table->foreignId('field_id')->nullable()->constrained('invest_fields', 'id')->onUpdate('cascade')->onDelete('no action');
            $table->foreignId('idea_id')->nullable()->constrained('ideas', 'id')->onUpdate('cascade')->onDelete('no action');
            $table->foreignId('tech_id')->nullable()->constrained('ideas', 'id')->onUpdate('cascade')->onDelete('no action');
            $table->string('emps')->nullable();
            $table->string('startup_cost')->nullable();
            $table->string('space')->nullable();
            $table->string('categories_id')->nullable();
            $table->string('machines_id')->nullable();
            $table->string('materials_id')->nullable();
            $table->string('gallery', 125)->nullable()->default(NULL);
            $table->string('video', 125)->nullable()->default(NULL);
            $table->text('about')->nullable();
            $table->text('free_space1')->nullable();
            $table->text('free_space2')->nullable();
            $table->text('free_space3')->nullable();
            $table->enum('active', [0, 1])->default(1);
            $table->string('hs_code')->nullable();
            $table->bigInteger('counter')->nullable();
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
        Schema::dropIfExists('projects');
    }
}
