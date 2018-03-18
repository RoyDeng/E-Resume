<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // 執行資料庫異動
    public function up()
    {
        // 建立資料表
        Schema::create('education', function (Blueprint $table) {
            // 教育背景編號
            $table->increments('id');
            // 使用者編號
            $table->integer('user_id');
            // 開始年份
            $table->integer('from');
            // 結束年份
            $table->integer('to');
            // 學校
            $table->string('school', 80);
            // 科系
            $table->string('department', 80);
            // 敘述
            $table->text('description')->nullable();
            // 時間戳記
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    // 復原資料庫異動
    public function down()
    {
        // 移除資料表
        Schema::dropIfExists('education');
    }
}
