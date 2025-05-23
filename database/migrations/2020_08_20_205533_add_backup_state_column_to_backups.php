<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBackupStateColumnToBackups extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::table('backups', function (Blueprint $table) {
      $table->boolean('is_successful')->after('uuid')->default(true);
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::table('backups', function (Blueprint $table) {
      $table->dropColumn('is_successful');
    });
  }
}
