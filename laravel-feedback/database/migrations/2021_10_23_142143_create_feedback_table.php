<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback', function (Blueprint $table) {
            // 默认生成的自增 ID 字段
            $table->id();
            // 留言者称呼
            $table->string("name", 20)->nullable()->comment("留言者称呼");
            // 手机号码
            $table->string("phone", 20)->nullable()->comment("手机号码");
            // 标题
            $table->string("title")->nullable()->comment("留言标题");
            // 内容
            $table->text("content")->nullable()->comment("留言内容");
            // 软删除标识字段
            $table->softDeletes();
            // Schema 自动帮我们维护新增时间和更新时间
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
        Schema::dropIfExists('feedback');
    }
}
