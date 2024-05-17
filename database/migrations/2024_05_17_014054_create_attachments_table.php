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
        Schema::create('attachments', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->morphs('attachable');
            $table->string('path'); //uploads/documents/2023/12.4.xxx.398494894.333.pdf
            $table->string('name'); //book.pdf
            $table->string('file_name'); //name user enter for file my-book.pdf
            $table->string('mime_type'); //document/pdf, document/plain
            $table->string('extension'); //txt
            $table->double('size');
            $table->enum('size_unit', ['B', 'KB', 'MB']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attachments');
    }
};
