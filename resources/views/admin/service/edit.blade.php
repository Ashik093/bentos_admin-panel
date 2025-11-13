@extends('layouts.app')

@section('admin_content')
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Edit Service</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
						<li class="breadcrumb-item"><a href="{{ route('service.index') }}">Services</a></li>
						<li class="breadcrumb-item active">Edit</li>
					</ol>
				</div>
			</div>
		</div>
	</div>

	<section class="content">
		<div class="container-fluid">
			<div class="card">
				<div class="card-header bg-info">
					<h3 class="card-title">Edit Service</h3>
				</div>
				<div class="card-body">
					<form action="{{ route('service.update', $data->id) }}" method="post">
						@csrf
						@method('PUT')
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="title">Title <span class="text-danger">*</span></label>
									<input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $data->title) }}" placeholder="e.g., Web Development" required>
									@error('title')
										<div class="invalid-feedback d-block">{{ $message }}</div>
									@enderror
								</div>

								<div class="form-group">
									<label for="icon">Icon</label>
									<input type="text" name="icon" id="icon" class="form-control @error('icon') is-invalid @enderror" value="{{ old('icon', $data->icon) }}" placeholder="e.g., fas fa-code">
									@error('icon')
										<div class="invalid-feedback d-block">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label for="order">Order</label>
									<input type="number" name="order" id="order" class="form-control @error('order') is-invalid @enderror" value="{{ old('order', $data->order) }}" placeholder="e.g., 1" min="0">
									@error('order')
										<div class="invalid-feedback d-block">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-12">
								<div class="form-group">
									<label for="description">Description</label>
									<textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="6" placeholder="Describe the service...">{{ old('description', $data->description) }}</textarea>
									@error('description')
										<div class="invalid-feedback d-block">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-12">
								<button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Update Service</button>
								<a href="{{ route('service.index') }}" class="btn btn-secondary"><i class="fas fa-times"></i> Cancel</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>

@endsection
