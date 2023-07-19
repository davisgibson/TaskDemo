<div data-id="{{ $task->id }}" class="card card-body draggable d-flex flex-row justify-content-between flex-nowrap align-items-center" style="background-color: rgba(255, 255, 255, 0.9);">
	<a href="/tasks/{{ $task->id }}/edit" class="d-flex flex-column">
		<span style="font-weight: 500;">{{ $task->name }}</span>
		<small style="opacity: 0.6;">Last updated {{ $task->updated_at->diffForHumans() }}</small>
	</a>
	<div class="d-inline-flex align-items-center">
		<a class="mr-4" href="/tasks/{{ $task->id }}/edit" style="opacity: 0.7;">edit</a>
		<span class="drag-icon"></span>
	</div>
</div>