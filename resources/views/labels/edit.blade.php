@extends('layouts.app')

@section('content')
<div class="card">
	<div class="card-header d-flex justify-content-between align-items-center" style="background-color: rgba(223, 228, 235, 0.5)">
		<span style="font-weight: 500">Edit Label</span>
		<form method="POST" action="/labels/{{ $label->id }}">
			@csrf
			@method('delete')
			<button type="submit" style="opacity: 0.9" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure you want to delete this label? This action cannot be undone.')" style="color: white;">Delete label</button>
		</form>
	</div>
	<div class="card-body" style="background-color: rgba(255, 255, 255, 0.5)">
		<form method="POST" action="/labels/{{ $label->id }}">
			@csrf
			@method('PUT')
			<div class="col-8">
				<div class="form-group">
					<label for="name">Name <small class="text-muted">(should be one lowercase word)</small></label>
					<input type="text" class="form-control" name="name" id="name" value="{{ $label->name }}" maxlength="15" required>
				</div>

				<div class="form-group" style="max-width: 150px;">
					<label for="name">Color</label>
					<input type="color" class="form-control" name="color" id="color" value="{{ $label->color }}" maxlength="15" required>
				</div>

				<div class="float-right">
					<a onclick="return confirm('Are you sure you want to leave? Your changes will not be saved.')" class="btn btn-outline-secondary" href="/labels">Cancel</a>
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection