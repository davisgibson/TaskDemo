@extends('layouts.app')

@section('content')
<a class="text-muted text-sm ml-3 d-md-none d-xs-block" href="/">Back to projects</a>
<div class="card mt-2 mt-md-0">
	<div style="background-color: rgba(223, 228, 235, 0.5);" class="card-header d-flex justify-content-between align-items-center">
		<div class="d-flex align-items-center">
			<span style="font-weight: 550;">Tasks</span>
			<div style="min-width: 10%" class="ml-3">
				<div class="form-inline d-none d-xl-block">
					<span class="text-muted mx-2"> for </span>
					<select class="selectpicker" style="max-width: 450px;" id="select_project">
						@foreach($projects as $project)
						<option name="project" value="{{ $project->id }}"{{ $project->id == $current_project->id ? ' selected' : '' }}>{{ $project->name }}</option>
						@endforeach
					</select>
				</div>
			</div>
		</div>
		<div class="d-inline-flex">
			<div class="form-inline mr-3" style="max-width: 40%;">
				<span class="text-muted mx-2 d-none {{ request()->has('labels') ? 'd-lg-block' : '' }}"> showing only  </span>
				<select id="filterByLabel" class="d-block" multiple>
					@foreach($labels as $label)
						<option style="background-color: linear-gradient({{ $label->color }}, #FFFFFF);" class="labelOption label-{{ $label->id }}" name="labels[]" value="{{ $label->id }}" {{ $label->isSelected ? ' selected' : '' }}>{{ $label->name }}</option>
					@endforeach
				</select>
			</div>
			<div class="dropdown">
				<button class="btn btn-primary dropdown-toggle" type="button" id="actionMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    Options
				</button>
				<div class="dropdown-menu" aria-labelledby="actionMenu">
					<!-- normally I would make the following query string with a form, but it doesn't work well with the dropdown. -->
					<a class="dropdown-item" href="/tasks/create?project={{ $current_project->id }}">New task</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="/labels">Labels</a>
				</div>
			</div>
		</div>
		
	</div>
	<div class="card-body p-0" style="background-color: rgba(191, 200, 211, 0.5)" id="tasks_container">
		@each('tasks.partials.list-item', $tasks, 'task')
	</div>
</div>
@endsection

@push('stylestack')
<style>
	@foreach($labels as $label)
	.label-{{ $label->id }} > .text::before {
		content: '';
		margin-right: 5px;
		display: inline-block;
		width: 10px;
		height: 10px;
		border-radius: 50%;
		background-color: {{ $label->color }};
		opacity: 0.9;
	}
	.label-{{ $label->id }}:focus {
		background-color: {{ $label->color }};
	}
	@endforeach
</style>
@endpush

@push('scriptstack')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js" integrity="sha512-Eezs+g9Lq4TCCq0wae01s9PuNWzHYoCMkE97e2qdkYthpI0pzC3UGB03lgEHn2XM85hDOUF6qgqqszs+iXU4UA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
	$('#select_project').change(function(e) {
		var project_id = $(this).val();
		if(project_id != "{{ $current_project->id }}")
			window.location = "/projects/" + project_id;
	});

	$("#filterByLabel").selectpicker({
        noneSelectedText : 'Filter by Label',
    });

	$('#filterByLabel').change(function(e) {
		var params = {
			labels: $('#filterByLabel').val(),
		};

		window.location = "/projects/{{ $current_project->id }}" + '?' + $.param(params);
	});

	new Sortable($('#tasks_container')[0], {
	    group: "tasks", 
	    ghostClass: "sortable-ghost",
	    chosenClass: "sortable-chosen",
	    handle: ".drag-icon",
	    onUpdate: function (e) {
	      	var ordered_task_ids = this.toArray();
	      	$.ajax({
			    url: '/projects/{{ $current_project->id }}/tasks',
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