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
        Schema::create('product_photos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('product_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('photo');
            $table->boolean('is_thumb')->default(false);

            /**
             * is_thumb seria a foto destaque da home pro produto,
             * posso marcar uma thumb / havendo outra thumb marcada,
             * se eu atualizar pra uma nova thumb eu devo desmarcar a atual
             *
             * outro caminho pra thumb:
             * subquerie para pegar uma foto na listagem de todos os produtos
             * da home...
             */

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_photos');
    }
};
