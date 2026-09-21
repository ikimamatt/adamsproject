<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeImageNullableInSignatureNews extends Migration
{
    public function up()
    {
        Schema::table('signature_news', function (Blueprint $table) {
            $table->string('image')->nullable()->change(); // Make image nullable
        });
    }

    public function down()
    {
        Schema::table('signature_news', function (Blueprint $table) {
            $table->string('image')->nullable(false)->change(); // Revert to non-nullable if needed
        });
    }
}
