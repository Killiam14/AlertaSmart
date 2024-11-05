<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_reports_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Título del problema
            $table->text('description'); // Descripción del problema
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
