<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMachinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machines', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('category_id')->nullable()->constrained('categories')->onUpdate('cascade')->onDelete('no action');
            $table->string('price')->nullable();
            $table->foreignId('vendor_id')->nullable()->constrained('vendors', 'id')->onUpdate('cascade')->onDelete('no action');
            $table->string('gallery', 125)->nullable()->default(NULL);
            $table->string('video', 125)->nullable()->default(NULL);
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
        Schema::dropIfExists('machines');
    }
}
