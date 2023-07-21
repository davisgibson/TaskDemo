<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Database\Factories\TaskFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use App\Models\Label;

class Task extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function project()
    {
    	return $this->belongsTo(Project::class);
    }

    public function labels()
    {
        return $this->belongsToMany(Label::class);
    }

    protected static function newFactory(): Factory
	{
	    return TaskFactory::new();
	}
}
