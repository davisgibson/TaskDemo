<a href="/projects/{{ $project->id }}" class="card card-body">
	<div class="d-flex justify-content-between flex-nowrap">
		<div class="d-flex flex-column">
			<b style="opacity: 0.9;">{{ $project->name }}</b>
			<small class="text-muted">{{ $project->number_of_tasks }} current tasks</small>
		</div>
		<small class="text-muted d-none d-md-block">created {{ $project->created_at->diffForHumans() }}</small>
	</div>
</a>