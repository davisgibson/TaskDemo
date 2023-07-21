<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Task;

class Label extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function tasks()
    {
    	return $this->belongsToMany(Task::class, 'label_task');
    }

    public function taskCountForHumans($projectId = false)
    {
    	$query = $this->tasks();
    	if($projectId)
    		$query->where('project_id', $projectId);
    	$count = $query->count();

    	return $count . ' ' . Str::plural('task', $count);
    }

    // *note* contrasts the text with the background based on lightness.
    public function getTextColorAttribute()
    {
    	return $this->isBackgroundDark() ? '#FFFFFF' : '#000000';
    }

    // *note* probably the simplest way to find out if a color is dark
    // gets the average color value from RGB array
    // Dark < 180 < Light
    // If this doesn't work well, use HSLA instead of RGB
    protected function isBackgroundDark()
    {
    	$backgroundAsRGB = $this->getRGBFromHex($this->color);
    	$averageColorValue = $this->getAverageColorValue($backgroundAsRGB);
    	
    	return $averageColorValue < 180;
    }

    protected function getRGBFromHex($hex)
    {
	   $hex = str_replace('#', '', $hex);
	   $rgb['r'] = hexdec(substr($hex, 0, 2));
	   $rgb['g'] = hexdec(substr($hex, 2, 2));
	   $rgb['b'] = hexdec(substr($hex, 4, 2));

	   return $rgb;
    }

    protected function getAverageColorValue($rgb)
    {
    	return ($rgb['r'] + $rgb['g'] + $rgb['b']) / 3;
    }
}
