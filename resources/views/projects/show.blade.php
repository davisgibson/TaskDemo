@extends('layouts.app')

@section('content')
<div class="card">
	<div class="card-header d-flex justify-content-between align-items-center" style="background-color: rgba(223, 228, 235, 0.5)">
		<b>Tasks</b>
		<div style="min-width: 10%">
			<div class="form-inline">
				<small class="text-muted d-inline-block mr-2"> relating to project </small>
				<select class="custom-select d-inline-block" style="max-width: 450px;" id="select_project">
					@foreach($projects as $project)
					<option name="project" value="{{ $project->id }}"{{ $project->id == $current_project->id ? ' selected' : '' }}>{{ $project->name }}</option>
					@endforeach
				</select>
			</div>
		</div>
		<form method="GET" action="/tasks/create">
			<input type="hidden" name="project" value="{{ $current_project->id }}">
			<button type="submit" class="btn btn-primary btn-sm">New task</button>
		</form>
	</div>
	<div class="card-body p-0" style="background-color: rgba(191, 200, 211, 0.5)" id="tasks_container">
		@each('tasks.partials.task', $current_project->ordered_tasks, 'task')
	</div>
</div>
@endsection

@push('scriptstack')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js" integrity="sha512-Eezs+g9Lq4TCCq0wae01s9PuNWzHYoCMkE97e2qdkYthpI0pzC3UGB03lgEHn2XM85hDOUF6qgqqszs+iXU4UA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
	$('#select_project').change(function(e) {
		var project_id = $(this).val();
		if(project_id != "{{ $current_project->id }}")
			window.location = "/projects/" + project_id;
	});

	new Sortable($('#tasks_container')[0], {
	    group: "tasks", 
	    ghostClass: "sortable-ghost",
	    chosenClass: "sortable-chosen",
	    handle: ".drag-icon",
	    onUpdate: function (e) {
	      	var ordered_task_ids = this.toArray();
	      	$.ajax({
			    url: '/projects/{{ $project->id }}/tasks',
			    type: 'PUT',
			    data : {
			        'ordered_task_ids': ordered_task_ids,
			        '_token': "{{ csrf_token() }}",
			    },
			    dataType:'json',
			    success : function(data) {              
			        console.log('changes saved successfully');
			    }
			});
	    },
	});
</script>
@endpush