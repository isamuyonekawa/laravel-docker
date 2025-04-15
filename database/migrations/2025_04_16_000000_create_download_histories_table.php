<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('download_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->comment('ユーザーID');
            $table->enum('type', ['contract_csv', 'user_list', 'sales_report', 'inventory_list'])->comment('種別');
            $table->enum('status', ['pending', 'completed', 'failed'])->comment('ステータス');
            $table->json('search_conditions')->nullable()->comment('検索条件');
            $table->string('s3_file_path')->nullable()->comment('S3ファイルパス');
            $table->timestamps();
        });
    }

    /*
+-------------------+------------------------------------------------------------------+------+-----+---------+----------------+
| Field             | Type                                                             | Null | Key | Default | Extra          |
+-------------------+------------------------------------------------------------------+------+-----+---------+----------------+
| id                | bigint unsigned                                                  | NO   | PRI | NULL    | auto_increment |
| user_id           | bigint unsigned                                                  | NO   |     | NULL    |                |
| type              | enum('contract_csv','user_list','sales_report','inventory_list') | NO   |     | NULL    |                |
| status            | enum('pending','completed','failed')                             | NO   |     | NULL    |                |
| search_conditions | json                                                             | YES  |     | NULL    |                |
| s3_file_path      | varchar(255)                                                     | YES  |     | NULL    |                |
| created_at        | timestamp                                                        | YES  |     | NULL    |                |
| updated_at        | timestamp                                                        | YES  |     | NULL    |                |
+-------------------+------------------------------------------------------------------+------+-----+---------+----------------+
8 rows in set (0.00 sec)
*/

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('download_histories');
    }
};
