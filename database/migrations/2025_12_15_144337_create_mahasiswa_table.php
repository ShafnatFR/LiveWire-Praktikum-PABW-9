<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->string('nim')->unique();
            $table->string('nama');
            $table->string('prodi');

            // [Perbaikan] Ubah decimal(3,2) menjadi integer
            $table->integer('sks');

            // [Tambahan] Tambahkan kolom IPK karena dipakai di View
            $table->decimal('ipk', 3, 2); // Contoh: 3.85 (Maks 9.99 cukup untuk IPK)

            $table->enum('status', ['aktif', 'cuti', 'lulus', 'drop out']);
            $table->enum('kategori', ['reguler', 'internasional']);
            $table->timestamps();
        });
    }
};
