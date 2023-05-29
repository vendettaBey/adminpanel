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
        Schema::create('siparisler', function (Blueprint $table) {
            $table->id();
            $table->string('siparis_adi');
            $table->longtext('urunler');
            $table->longtext('siprais_ekstra');
            $table->longtext('sipartis_notu');
            $table->string('fiyat');
            $table->string('kim');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siparislers');
    }
};