@extends('layouts.app')

@section('content')
<div class="card">
	<div class="card-header d-flex justify-content-between align-items-center" style="background-color: rgba(223, 228, 235, 0.5)">
		<span style="font-weight: 500">Edit Task</span>
		<form method="POST" action="/tasks/{{ $task->id }}">
			@csrf
			@method('delete')
			<button type="submit" style="opacity: 0.9" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure you want to delete this task? This action cannot be undone.')" style="color: white;">Delete task</button>
		</form>
	</div>
	<div class="card-body" style="background-color: rgba(255, 255, 255, 0.5)">
		<form method="POST" action="/tasks/{{ $task->id }}">
			@csrf
			@method('PUT')
			<div class="col-8">
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" class="form-control" name="name" id="name" value="{{ $task->name }}" maxlength="75" required>
				</div>

				<div class="form-group mt-4">
					<label for="project">Project</label>
					<select name="project" id="project" class="custom-select">
						@foreach($projects as $project)
						<option value="{{ $project->id }}" {{ $task->project_id == $project->id ? 'selected' : ''}}>{{ $project->name }}</option>
						@endforeach
					</select>
				</div>
				<div class="my-3">
					<button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#label_collapse" aria-expanded="{{ $task->labels()->exists() ? 'true' : 'false' }}"> Add Labels <i style="color: rgba(255, 255, 255, 0.6)!important" class="expand_caret fa-solid fa-caret-down"></i></button>
					<div class="collapse {{ $task->labels()->exists() ? 'show' : '' }} my-3" id="label_collapse">
					  <div class="d-flex flex-column align-items-start justify-content-between">
					  	@foreach($labels as $label)
					  		@include('labels.partials.checkbox', ['labels' => $labels, 'checkedLabels' => $task->labels()->pluck('id')])
					  	@endforeach
					  </div>
					</div>
				</div>
				<div class="float-right">
					<a onclick="return confirm('Are you sure you want to leave? Your changes will not be saved.')" class="btn btn-outline-secondary" href="/projects/{{ $task->project_id }}">Cancel</a>
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection