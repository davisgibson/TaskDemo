<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Label;
use App\Models\Task;

class ProjectController extends Controller
{

    use AuthorizesRequests, ValidatesRequests;

    public function show(Request $request, Project $project)
    {
        $labels = Label::all();
        if($request->has('labels'))
        {
            $filterByLabels = collect($request->labels);
            //assign isSelected now because it looks messy on the front end.
            $labels->map(function($label) use ($request, $filterByLabels) {
                if($filterByLabels->contains($label->id))
                    $label->isSelected = true;

                return $label;
            });

            $tasks = $project->orderedTasks()->whereHas('labels', function($query) use ($filterByLabels) {
                $query->whereIn('id', $filterByLabels);
            })->get();
        }
        else
            $tasks = $project->orderedTasks;



        return view('projects.show')->with([
            'current_project' => $project,
            'tasks' => $tasks,
            'projects' => Project::orderBy('name', 'desc')->select('id', 'name')->get(),
            'labels' => $labels,
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
