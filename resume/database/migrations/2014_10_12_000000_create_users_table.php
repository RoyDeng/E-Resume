<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
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
        Schema::create('users', function (Blueprint $table) {
            // 會員編號
            $table->increments('id');
            // 大頭貼
            $table->string('photo', 50)->default('images/user/default.png');
            // 姓氏
            $table->string('lastname');
            // 姓名
            $table->string('firstname');
            // Email
            $table->string('email', 150)->unique();
            // 密碼
            $table->string('password', 60);
            // 性別
            $table->integer('sex')->default(0);
            // 生日
            $table->date('birthday')->nullable();
            // 地方
            $table->string('location', 50)->nullable();
            // 連絡電話
            $table->string('phone', 50)->nullable();
            // 語言
            $table->integer('lang')->default(0);
            // 自傳
            $table->text('bio')->nullable();
            // 技能
            $table->text('skills')->nullable();
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
        Schema::dropIfExists('users');
    }
}
