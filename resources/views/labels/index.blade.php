@extends('layouts.app')

@section('content')
<a class="text-muted text-sm ml-3" href="/">Back to projects</a>
<div class="card mt-2">
	<div class="card-header d-flex justify-content-between align-items-center" style="background-color: rgba(223, 228, 235, 0.5)">
		<span>Labels</span>
		<a href="/labels/create" class="btn btn-primary btn-sm">New Label</a>
	</div>
	<div class="card-body p-0" style="background-color: rgba(191, 200, 211, 0.5)">
		@each('labels.partials.list-item', $labels, 'label')
	</div>
</div>
@endsection