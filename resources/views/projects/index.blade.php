@extends('layouts.app')

@section('content')
<div class="card">
	<div class="card-header" style="background-color: rgba(223, 228, 235, 0.5)">
		<span>Projects</span>
	</div>
	<div class="card-body p-0" style="background-color: rgba(191, 200, 211, 0.5)">
		@each('projects.partials.list-item', $projects, 'project')
	</div>
</div>
@endsection