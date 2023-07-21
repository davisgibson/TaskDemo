<div data-id="{{ $task->id }}" class="card card-body draggable d-flex flex-row justify-content-between flex-nowrap align-items-center" style="background-color: rgba(255, 255, 255, 0.9);">
	<a href="/tasks/{{ $task->id }}/edit" class="d-flex flex-column" style="overflow: hidden;">
		<span style="font-weight: 500;">
			<div class="d-inline-block d-md-none">
				@foreach($task->labels as $label)
				<span class="dot-label-{{ $label->id }} mb-1 mx-0 my-auto"></span>
				@endforeach
			</div>
			{{ $task->name }}
			<div class="d-none d-md-inline">
			@each('labels.partials.badge', $task->labels, 'label')
			</div>
		</span>
		<small style="opacity: 0.6;">Last updated {{ $task->updated_at->diffForHumans() }}</small>
	</a>
	<div class="d-inline-flex align-items-center">
		<a class="mr-4 ml-1" href="/tasks/{{ $task->id }}/edit" style="opacity: 0.7;">edit</a>
		@if(!request()->has('labels'))
			<span class="drag-icon"></span>
		@endif
	</div>
</div>