<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use App\Models\Project;
use App\Models\Task;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // *note*
        // this migration inserts default projects and tasks so that you don't have to manually create them.
        // in a non-demo environemnt, I would certainly find a better way to do this.

        $defaultProject1 = Project::create(['name' => 'Default Project 1']);

        $defaultProject2 = Project::create(['name' => 'Default Project 2']);

        //create 20 tasks and assign to each project.

        for($priority = 1; $priority <= 10; $priority++)
        {

            Task::factory()->create([
                'priority' => $priority,
                'project_id' => $defaultProject1
            ]);

            Task::factory()->create([
                'priority' => $priority,
                'project_id' => $defaultProject2
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
    }
};
