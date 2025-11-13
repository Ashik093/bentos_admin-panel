@extends('layouts.app')

@section('admin_content')
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Add Testimonial</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
						<li class="breadcrumb-item"><a href="{{ route('testimonial.index') }}">Testimonials</a></li>
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
					<h3 class="card-title">New Testimonial</h3>
				</div>
				<div class="card-body">
					<form action="{{ route('testimonial.store') }}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="client_name">Client Name <span class="text-danger">*</span></label>
									<input type="text" name="client_name" id="client_name" class="form-control @error('client_name') is-invalid @enderror" value="{{ old('client_name') }}" placeholder="e.g., John Doe" required>
									@error('client_name')
										<div class="invalid-feedback d-block">{{ $message }}</div>
									@enderror
								</div>

								<div class="form-group">
									<label for="client_position">Client Position</label>
									<input type="text" name="client_position" id="client_position" class="form-control @error('client_position') is-invalid @enderror" value="{{ old('client_position') }}" placeholder="e.g., CEO at ABC Company">
									@error('client_position')
										<div class="invalid-feedback d-block">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label for="photo">Client Photo</label>
									<div class="mb-2">
										<img id="photoPreview" src="" alt="" style="max-width:150px; max-height:150px; display:none; border-radius:4px;" />
									</div>
									<div class="custom-file">
										<input type="file" name="photo" id="photo" accept="image/*" class="custom-file-input @error('photo') is-invalid @enderror" onchange="readURL(this,'photoPreview');">
										<label class="custom-file-label" for="photo">Choose client photo</label>
									</div>
									@error('photo')
										<div class="invalid-feedback d-block">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-12">
								<div class="form-group">
									<label for="message">Testimonial Message <span class="text-danger">*</span></label>
									<textarea name="message" id="message" class="form-control @error('message') is-invalid @enderror" rows="6" placeholder="Write the testimonial message..." required>{{ old('message') }}</textarea>
									@error('message')
										<div class="invalid-feedback d-block">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-12">
								<button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Save Testimonial</button>
								<a href="{{ route('testimonial.index') }}" class="btn btn-secondary"><i class="fas fa-times"></i> Cancel</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>

	@push('scripts')
	<script>
		function readURL(input, previewId) {
			var preview = document.getElementById(previewId);
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e) {
					preview.src = e.target.result;
					preview.style.display = 'block';
				}
				reader.readAsDataURL(input.files[0]);
			}
		}
		// show filename in custom-file-label
		document.addEventListener('change', function (e) {
			if (e.target.classList.contains('custom-file-input')) {
				var fileName = e.target.files[0] ? e.target.files[0].name : '';
				var label = e.target.nextElementSibling;
				if (label && label.classList.contains('custom-file-label')) {
					label.textContent = fileName;
				}
			}
		});
	</script>
	@endpush

@endsection()