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
        Schema::table('pinjam', function (Blueprint $table) {
            $table->date('tgl_dikembalikan')->nullable()->after('tgl_kembali');

            $table->enum('status', ['pinjam', 'kembali', 'terlambat'])
                  ->default('pinjam')
                  ->after('tgl_dikembalikan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pinjam', function (Blueprint $table) {
            $table->dropColumn('tgl_dikembalikan');
            $table->dropColumn('status');
        });
    }
};
