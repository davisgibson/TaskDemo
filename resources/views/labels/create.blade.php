@extends('layouts.app')

@section('content')
<div class="card">
	<div class="card-header d-flex justify-content-between align-items-center" style="background-color: rgba(223, 228, 235, 0.5)">
		<span style="font-weight: 500">Create Label</span>
	</div>
	<div class="card-body" style="background-color: rgba(255, 255, 255, 0.5)">
		<form method="POST" action="/labels">
			@csrf
			<div class="col-8">
				<div class="form-group">
					<label for="name">Name <small class="text-muted">(should be one lowercase word)</small></label>
					<input type="text" class="form-control" name="name" id="name" maxlength="20" required>
				</div>

				<div class="form-group" style="max-width: 150px;">
					<label for="name">Color</label>
					<input type="color" class="form-control" name="color" id="color" value="#6699cb" maxlength="15" required>
				</div>
				<a class="text-muted text-sm" href="https://www.canva.com/colors/color-wheel/" target="_blank">how to pick the best color</a>

				<div class="float-right">
					<a onclick="return confirm('Are you sure you want to leave? Your changes will not be saved.')" class="btn btn-outline-secondary" href="/labels">Cancel</a>
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection