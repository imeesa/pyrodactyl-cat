<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('jobs', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('queue');
      $table->longText('payload');
      $table->tinyInteger('attempts')->unsigned();
      $table->tinyInteger('reserved')->unsigned();
      $table->unsignedInteger('reserved_at')->nullable();
      $table->unsignedInteger('available_at');
      $table->unsignedInteger('created_at');

      $table->index(['queue', 'reserved', 'reserved_at']);
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('jobs');
  }
}
