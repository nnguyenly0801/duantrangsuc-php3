<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('comments', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id')->nullable(); // Người dùng có thể bị xóa
        $table->unsignedBigInteger('product_id'); // Liên kết với sản phẩm
        $table->text('comment');
        $table->timestamps();

        // Khóa ngoại
        $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
    });
}

public function down()
{
    Schema::dropIfExists('comments');
}

};
