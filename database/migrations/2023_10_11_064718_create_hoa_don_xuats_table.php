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
        Schema::create('hoa_don_xuats', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("khach_hangs_id");
            $table->string("ngay_giao");
            $table->string('dia_chi');
            $table->string('sdt');
            $table->double('thanh_tien');
            $table->boolean('trang_thai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hoa_don_xuats');
    }
};
