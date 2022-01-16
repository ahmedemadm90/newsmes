<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('vendor_id')->nullable()->constrained('vendors', 'id')->onUpdate('cascade')->onDelete('no action');
            $table->text('machines_id')->nullable();
            $table->string('unit')->nullable();
            $table->string('unit_price')->nullable();
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
        Schema::dropIfExists('materials');
    }
}
