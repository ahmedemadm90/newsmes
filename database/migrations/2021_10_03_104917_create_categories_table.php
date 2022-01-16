<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('ar_name');
            $table->string('en_name');
            $table->enum('active', [0, 1]);
            $table->string('img')->nullable()->default(NULL);
            $table->string('hs_code')->nullable();
            $table->bigInteger('counter')->nullable();
            /* $table->string('parents_ids');
            $table->timestamps(); */
        });
        Schema::table('categories', function ($table) {
            $table->foreignId('parent_id')->nullable()->constrained('categories', 'id')
                ->onUpdate('cascade')->onDelete('no action');
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
        Schema::dropIfExists('categories');
    }
}
