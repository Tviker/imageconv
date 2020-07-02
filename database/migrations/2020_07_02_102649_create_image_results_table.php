<?php

use App\ImageResult;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_results', function (Blueprint $table) {
            $table->id();
            $table->text('base_64')->nullable(false);
            $table->enum('type', [ImageResult::SQUARE, ImageResult::SMALL, ImageResult::ORIGINAL]);
            $table->string('hash_image')->index();
            $table->string('path_image')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('image_results');
    }
}
