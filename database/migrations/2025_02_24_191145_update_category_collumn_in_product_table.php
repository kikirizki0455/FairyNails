<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('category'); // Hapus kolom lama
        });

        Schema::table('products', function (Blueprint $table) {
            $table->enum('category', ['Nail Art', 'Nail Extension', 'Press On Nails'])->after('id'); // Tambahkan ulang
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('category');
            $table->enum('category', ['nail_art', 'nail_extension', 'press_on_nails']);
        });
    }
};
