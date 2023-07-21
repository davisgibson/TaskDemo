<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Task;

class Project extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function tasks()
    {
    	return $this->hasMany(Task::class);
    }

    public function getNumberOfTasksAttribute()
    {
    	return $this->tasks()->count();
    }

    public function orderedTasks()
    {
        return $this->hasMany(Task::class)->orderBy('priority', 'asc');
    }

    // *note* finds an absolute priority from a percentage
    public function getPriorityFromPercent($percentAsWholeNumber)
    {
        $percentAsDecimal = $percentAsWholeNumber / 100;

        $priority = intval($percentAsDecimal * $this->number_of_tasks + 1);
        

        return $priority;
    }

    // *note* takes all tasks including and after $priority and raises them by 1.
    // used before inserting new tasks
    // uses withoutTimestamps because changing priority is not significant enough to
    // update timestamps for every task in the project.
    public function incrementTasksStartingFromPriority($priority)
    {
        Task::withoutTimestamps(function () use ($priority) {
            $this->tasks()
                    ->where('priority', '>=', $priority)
                    ->increment('priority');
        });
    }

    public function decrementTasksStartingFromPriority($priority)
    {
        Task::withoutTimestamps(function () use ($priority) {
            $this->tasks()
                    ->where('priority', '>=', $priority)
                    ->decrement('priority');
        });
    }
}
