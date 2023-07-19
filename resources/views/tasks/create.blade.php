@extends('layouts.app')

@section('content')
<div class="card">
	<div class="card-header d-flex justify-content-between align-items-center" style="background-color: rgba(223, 228, 235, 0.5)">
		<span style="font-weight: 500">New Task</span>
	</div>
	<div class="card-body" style="background-color: rgba(255, 255, 255, 0.5)">
		<form method="POST" action="/tasks">
			@csrf
			<div class="col-12 col-lg-8">
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" class="form-control" name="name" id="name" value="" maxlength="75" required>
				</div>

				<div class="form-group mt-4">
					<label for="priority">Priority <small class="text-muted ml-2"> (relative to other tasks)</small></label>
					<div class="d-flex justify-content-between flex-nowrap">
						<span class="badge p-2" style="background-color: rgba(241, 14, 75, 0.4)">High</span>
						<input type="range" class="form-control-range mx-1" name="priority" id="priority" value="50" min="1" max="100" required>
						<span class="badge p-2" style="background-color: rgba(75, 241, 14, 0.4)">Low</span>
					</div>
				</div>
				<small class="text-muted">Priority controls where this task is sorted in the project. Don't worry, you can change this later.</small>

				<div class="form-group mt-4">
					<label for="project">Project</label>
					<select name="project" id="project" class="custom-select">
						@foreach($projects as $project)
						<option value="{{ $project->id }}" {{ ($current_project && $current_project->id == $project->id) ? 'selected' : ''}}>{{ $project->name }}</option>
						@endforeach
					</select>
				</div>
				<div class="float-right">
					<a onclick="return confirm('Are you sure you want to leave? Your changes will not be saved.')" class="btn btn-outline-secondary" href="{{ $current_project ? '/projects/' . $current_project->id : '/' }}">Cancel</a>
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection