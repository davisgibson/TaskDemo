<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Label;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('labels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('color');
            $table->timestamps();
        });

        Schema::create('label_task', function (Blueprint $table) {
            $table->unsignedBigInteger('label_id');
            $table->unsignedBigInteger('task_id');
            $table->timestamps();

            $table->foreign('label_id')->references('id')->on('labels')->onDelete('cascade');
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');
        });

        // create default labels

        Label::create([
            'name' => 'feature',
            'color' => '#66CBCB',
        ]);

        Label::create([
            'name' => 'documentation',
            'color' => '#6667CB',
        ]);

        Label::create([
            'name' => 'bug',
            'color' => '#CB6699',
        ]);

        Label::create([
            'name' => 'question',
            'color' => '#CB9866',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('labels');
    }
};
