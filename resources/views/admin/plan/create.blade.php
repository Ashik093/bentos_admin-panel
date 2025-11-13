@extends('layouts.app')

@section('admin_content')
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Add Plan</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
						<li class="breadcrumb-item"><a href="{{ route('plan.index') }}">Plans</a></li>
						<li class="breadcrumb-item active">Create</li>
					</ol>
				</div>
			</div>
		</div>
	</div>

	<section class="content">
		<div class="container-fluid">
			<div class="card">
				<div class="card-header bg-info">
					<h3 class="card-title">New Plan</h3>
				</div>
				<div class="card-body">
					<form action="{{ route('plan.store') }}" method="post">
						@csrf
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="name">Name <span class="text-danger">*</span></label>
									<input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="e.g., Basic Plan" required>
									@error('name')
										<div class="invalid-feedback d-block">{{ $message }}</div>
									@enderror
								</div>

								<div class="form-group">
									<label for="subtitle">Subtitle</label>
									<input type="text" name="subtitle" id="subtitle" class="form-control @error('subtitle') is-invalid @enderror" value="{{ old('subtitle') }}" placeholder="e.g., Perfect for small businesses">
									@error('subtitle')
										<div class="invalid-feedback d-block">{{ $message }}</div>
									@enderror
								</div>

								<div class="form-group">
									<label for="price">Price <span class="text-danger">*</span></label>
									<input type="number" step="0.01" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" placeholder="e.g., 99.99" required>
									@error('price')
										<div class="invalid-feedback d-block">{{ $message }}</div>
									@enderror
								</div>

								<div class="form-group">
									<label for="per">Per</label>
									<input type="text" name="per" id="per" class="form-control @error('per') is-invalid @enderror" value="{{ old('per') }}" placeholder="e.g., month">
									@error('per')
										<div class="invalid-feedback d-block">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label for="button_label">Button Label</label>
									<input type="text" name="button_label" id="button_label" class="form-control @error('button_label') is-invalid @enderror" value="{{ old('button_label') }}" placeholder="e.g., Get Started">
									@error('button_label')
										<div class="invalid-feedback d-block">{{ $message }}</div>
									@enderror
								</div>

								<div class="form-group">
									<div class="custom-control custom-checkbox">
										<input type="checkbox" name="is_popular" id="is_popular" class="custom-control-input @error('is_popular') is-invalid @enderror" value="1" {{ old('is_popular') ? 'checked' : '' }}>
										<label class="custom-control-label" for="is_popular">Mark as Popular Plan</label>
										@error('is_popular')
											<div class="invalid-feedback d-block">{{ $message }}</div>
										@enderror
									</div>
								</div>
							</div>

							<div class="col-12">
								<div class="form-group">
									<label for="features">Features</label>
									<textarea name="features" id="features" class="form-control @error('features') is-invalid @enderror" rows="6" placeholder="List features, one per line...">{{ old('features') ? implode("\n", old('features')) : '' }}</textarea>
									<small class="form-text text-muted">Enter each feature on a new line</small>
									@error('features')
										<div class="invalid-feedback d-block">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-12">
								<button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Save Plan</button>
								<a href="{{ route('plan.index') }}" class="btn btn-secondary"><i class="fas fa-times"></i> Cancel</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>

@endsection
