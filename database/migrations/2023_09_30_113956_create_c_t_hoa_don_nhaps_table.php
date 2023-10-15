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
        Schema::create('c_t_hoa_don_nhaps', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('hoa_don_nhaps_id');
            $table->bigInteger('san_phams_id');
            $table->integer('so_luong');
            $table->double('gia_nhap');
            $table->double('gia_ban');
            $table->string('lo_nhap');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('c_t_hoa_don_nhaps');
    }
};
