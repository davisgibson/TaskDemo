<div class="card card-body draggable d-flex flex-row justify-content-between flex-nowrap align-items-center" style="background-color: rgba(255, 255, 255, 0.9);">
	<a href="/labels/{{ $label->id }}/edit" class="d-flex flex-column">
		<span style="font-weight: 500;">
			{{ $label->name }}
			@include('labels.partials.badge', ['label' => $label])
		</span>
		<small style="opacity: 0.6;">{{ $label->taskCountForHumans() }}</small>
	</a>
	<a class="mr-4" href="/labels/{{ $label->id }}/edit" style="opacity: 0.7;">edit</a>
</div>