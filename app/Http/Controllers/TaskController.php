<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;
use App\Models\Label;

class TaskController extends Controller
{

    public function create(Request $request)
    {
        $project = $request->has('project') ? Project::find($request->project) : false;

        return view('tasks.create')->with([
            'current_project' => $project,
            'projects' => Project::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'priority' => 'required|int',
            'project' => 'required|int',
        ]);


        $project = Project::find($request->project);

        $priority = $project->getPriorityFromPercent($request->priority);

        $project->incrementTasksStartingFromPriority($priority);

        $task = Task::create([
            'name' => $request->name,
            'project_id' => $project->id,
            'priority' => $priority
        ]);

        return redirect("/projects/{$project->id}");
    }

    public function edit(Task $task)
    {
        return view('tasks.edit')->with([
            'task' => $task,
            'projects' => Project::all(),
            'labels' => Label::all(),
        ]);
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'name' => 'required',
            'project' => 'required|int',
        ]);

        $task->update([
            'name' => $request->name,
            'project_id' => $request->project
        ]);

        $task->labels()->sync($request->labels);

        return redirect("/projects/{$request->project}");
    }

    public function destroy(Task $task)
    {
        $project = $task->project;

        $priority = $task->priority;

        $task->delete();

        $project->decrementTasksStartingFromPriority($priority);

        return redirect("/projects/{$project->id}");
    }

    public function show(Task $task)
    {
        dd('This function doesn\'t exist yet. How did you get here?');
    }
}
