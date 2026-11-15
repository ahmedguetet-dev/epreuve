<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
       Schema::table('epreuves', function (Blueprint $table) {
        $table->foreignId('matiere_id')
            ->nullable()
            ->constrained('matieres')
            ->nullOnDelete();
    });
    }

   
    public function down(): void
    {
        
    Schema::table('epreuves', function (Blueprint $table) {
        $table->dropForeign(['matiere_id']);
        $table->dropColumn('matiere_id');
    });
    }
};
