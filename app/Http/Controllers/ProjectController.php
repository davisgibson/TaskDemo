<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;

class ProjectController extends Controller
{

    use AuthorizesRequests, ValidatesRequests;

    public function show(Project $project)
    {
        return view('projects.show')->with([
            'current_project' => $project,
            'projects' => Project::orderBy('name', 'desc')->select('id', 'name')->get(),
        ]);
    }

    public function index()
    {
        return view('projects.index')->with([
            'projects' => Project::orderBy('id', 'desc')->get(),
        ]);
    }

    public function reorderTasks(Project $project, Request $request)
    {
        collect($request->ordered_task_ids)->each(function($task_id, $priority) {
            // *note* re-ordering a task is not significant enough to update its timestamp.
            // withoutTimestamp() here makes the updated_at column more practical.
            Task::withoutTimestamps(function () use ($priority, $task_id) {
                Task::where('id', $task_id)->update(['priority' => $priority + 1]);
            });
        });

        return response(200);
    }
}
