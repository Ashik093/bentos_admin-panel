@extends('layouts.app')

@section('admin_content')
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Add Education</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
						<li class="breadcrumb-item"><a href="{{ route('education.index') }}">Educations</a></li>
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
					<h3 class="card-title">New Education</h3>
				</div>
				<div class="card-body">
					<form action="{{ route('education.store') }}" method="post">
						@csrf
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="degree">Degree <span class="text-danger">*</span></label>
									<input type="text" name="degree" id="degree" class="form-control @error('degree') is-invalid @enderror" value="{{ old('degree') }}" placeholder="e.g., B.Sc. in Computer Science" required>
									@error('degree')
										<div class="invalid-feedback d-block">{{ $message }}</div>
									@enderror
								</div>

								<div class="form-group">
									<label for="institution">Institution <span class="text-danger">*</span></label>
									<input type="text" name="institution" id="institution" class="form-control @error('institution') is-invalid @enderror" value="{{ old('institution') }}" placeholder="e.g., ABC University" required>
									@error('institution')
										<div class="invalid-feedback d-block">{{ $message }}</div>
									@enderror
								</div>

								<div class="form-group">
									<label for="start_year">Start Year <span class="text-danger">*</span></label>
									<input type="number" name="start_year" id="start_year" class="form-control @error('start_year') is-invalid @enderror" value="{{ old('start_year') }}" placeholder="e.g., 2016" min="1900" max="{{ date('Y') }}" required>
									@error('start_year')
										<div class="invalid-feedback d-block">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label for="end_year">End Year</label>
									<input type="number" name="end_year" id="end_year" class="form-control @error('end_year') is-invalid @enderror" value="{{ old('end_year') }}" placeholder="e.g., 2020" min="1900" max="{{ date('Y') + 10 }}">
									@error('end_year')
										<div class="invalid-feedback d-block">{{ $message }}</div>
									@enderror
								</div>

								<div class="form-group">
									<label for="description">Description</label>
									<textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="5" placeholder="Details about courses, honours or activities">{{ old('description') }}</textarea>
									@error('description')
										<div class="invalid-feedback d-block">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-12">
								<button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Save Education</button>
								<a href="{{ route('education.index') }}" class="btn btn-secondary"><i class="fas fa-times"></i> Cancel</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>

@endsection()
@extends('layouts.app')

@section('admin_content')
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Add Experience</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
						<li class="breadcrumb-item"><a href="{{ route('experience.index') }}">Experiences</a></li>
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
					<h3 class="card-title">New Experience</h3>
				</div>
				<div class="card-body">
					<form action="{{ route('experience.store') }}" method="post">
						@csrf
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="title">Job Title <span class="text-danger">*</span></label>
									<input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="e.g., Senior Developer" required>
									@error('title')
										<div class="invalid-feedback d-block">{{ $message }}</div>
									@enderror
								</div>

								<div class="form-group">
									<label for="company_name">Company Name <span class="text-danger">*</span></label>
									<input type="text" name="company_name" id="company_name" class="form-control @error('company_name') is-invalid @enderror" value="{{ old('company_name') }}" placeholder="e.g., ABC Corporation" required>
									@error('company_name')
										<div class="invalid-feedback d-block">{{ $message }}</div>
									@enderror
								</div>

								<div class="form-group">
									<label for="start_year">Start Year <span class="text-danger">*</span></label>
									<input type="number" name="start_year" id="start_year" class="form-control @error('start_year') is-invalid @enderror" value="{{ old('start_year') }}" placeholder="e.g., 2020" min="1900" max="{{ date('Y') }}" required>
									@error('start_year')
										<div class="invalid-feedback d-block">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label for="end_year">End Year</label>
									<input type="number" name="end_year" id="end_year" class="form-control @error('end_year') is-invalid @enderror" value="{{ old('end_year') }}" placeholder="e.g., 2023" min="1900" max="{{ date('Y') + 10 }}">
									@error('end_year')
										<div class="invalid-feedback d-block">{{ $message }}</div>
									@enderror
								</div>

								<div class="form-group">
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="is_current" name="is_current" value="1" {{ old('is_current') ? 'checked' : '' }}>
										<label class="custom-control-label" for="is_current">Currently Working Here</label>
									</div>
								</div>

								<small class="form-text text-muted">
									If you check "Currently Working Here", the end year will be ignored.
								</small>
							</div>

							<div class="col-12">
								<div class="form-group">
									<label for="description">Description</label>
									<textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="5" placeholder="Describe your role, achievements, and responsibilities...">{{ old('description') }}</textarea>
									@error('description')
										<div class="invalid-feedback d-block">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-12">
								<button type="submit" class="btn btn-info">
									<i class="fas fa-save"></i> Save Experience
								</button>
								<a href="{{ route('experience.index') }}" class="btn btn-secondary">
									<i class="fas fa-times"></i> Cancel
								</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>

@endsection()



