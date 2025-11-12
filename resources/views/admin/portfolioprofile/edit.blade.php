@extends('layouts.app')

@section('admin_content')
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">

		@extends('layouts.app')

		@section('admin_content')
				<div class="content-header">
					<div class="container-fluid">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1 class="m-0">Edit Profile</h1>
							</div><!-- /.col -->
							<div class="col-sm-6">
								<ol class="breadcrumb float-sm-right">
									<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
									<li class="breadcrumb-item active">Profile</li>
								</ol>
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.container-fluid -->
				</div>

				<!-- Main content -->
				<section class="content">
					<div class="container-fluid">
						<div class="card">
							<div class="card-header bg-info">
								<h3 class="card-title">Edit Profile</h3>
							</div>
							<div class="card-body">
								<form action="{{ route('portfolioprofile.update', $data->id) }}" method="post" enctype="multipart/form-data">
									@csrf
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="name">Name <span class="text-danger">*</span></label>
												<input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $data->name) }}" required>
												@error('name')
													<div class="invalid-feedback d-block">{{ $message }}</div>
												@enderror
											</div>

											<div class="form-group">
												<label for="role">Role</label>
												<input type="text" name="role" id="role" class="form-control @error('role') is-invalid @enderror" value="{{ old('role', $data->role) }}">
												@error('role')
													<div class="invalid-feedback d-block">{{ $message }}</div>
												@enderror
											</div>

											<div class="form-group">
												<label for="short_description">Short Description</label>
												<textarea name="short_description" id="short_description" class="form-control @error('short_description') is-invalid @enderror" rows="3">{{ old('short_description', $data->short_description) }}</textarea>
												@error('short_description')
													<div class="invalid-feedback d-block">{{ $message }}</div>
												@enderror
											</div>

											<div class="form-group">
												<label for="long_description">Long Description</label>
												<textarea name="long_description" id="long_description" class="form-control @error('long_description') is-invalid @enderror" rows="5">{{ old('long_description', $data->long_description) }}</textarea>
												@error('long_description')
													<div class="invalid-feedback d-block">{{ $message }}</div>
												@enderror
											</div>

											<div class="form-group">
												<label for="bio">Bio</label>
												<textarea name="bio" id="bio" class="form-control @error('bio') is-invalid @enderror" rows="3">{{ old('bio', $data->bio) }}</textarea>
												@error('bio')
													<div class="invalid-feedback d-block">{{ $message }}</div>
												@enderror
											</div>

											<div class="form-group">
												<label for="location">Location</label>
												<input type="text" name="location" id="location" class="form-control @error('location') is-invalid @enderror" value="{{ old('location', $data->location) }}">
												@error('location')
													<div class="invalid-feedback d-block">{{ $message }}</div>
												@enderror
											</div>

											<div class="form-group form-check">
												<input type="checkbox" name="available_for_freelance" id="available_for_freelance" class="form-check-input" value="1" {{ old('available_for_freelance', $data->available_for_freelance) ? 'checked' : '' }}>
												<label class="form-check-label" for="available_for_freelance">Available for Freelance</label>
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label for="profile_photo">Profile Photo</label>
												<div class="mb-2">
													@if($data->profile_photo)
														<img id="profilePhotoPreview" src="{{ asset($data->profile_photo) }}" alt="profile" style="max-width:150px; max-height:150px; display:block;" />
													@else
														<img id="profilePhotoPreview" src="" alt="" style="max-width:150px; max-height:150px; display:none;" />
													@endif
												</div>
												<div class="custom-file">
													<input type="file" name="profile_photo" id="profile_photo" accept="image/*" class="custom-file-input @error('profile_photo') is-invalid @enderror" onchange="readURL(this,'profilePhotoPreview');">
													<label class="custom-file-label" for="profile_photo">Choose profile photo</label>
												</div>
												@error('profile_photo')
													<div class="invalid-feedback d-block">{{ $message }}</div>
												@enderror
											</div>

											<div class="form-group">
												<label for="cv_file">CV / Resume (pdf, doc, docx)</label>
												@if($data->cv_file)
													<div class="mb-2"><a href="{{ asset($data->cv_file) }}" target="_blank">Current CV</a></div>
												@endif
												<div class="custom-file">
													<input type="file" name="cv_file" id="cv_file" class="custom-file-input @error('cv_file') is-invalid @enderror">
													<label class="custom-file-label" for="cv_file">Choose CV file</label>
												</div>
												@error('cv_file')
													<div class="invalid-feedback d-block">{{ $message }}</div>
												@enderror
											</div>

											<div class="form-group">
												<label for="facebook_link">Facebook Link</label>
												<input type="url" name="facebook_link" id="facebook_link" class="form-control @error('facebook_link') is-invalid @enderror" value="{{ old('facebook_link', $data->facebook_link) }}">
												@error('facebook_link')
													<div class="invalid-feedback d-block">{{ $message }}</div>
												@enderror
											</div>

											<div class="form-group">
												<label for="x_link">X (Twitter) Link</label>
												<input type="url" name="x_link" id="x_link" class="form-control @error('x_link') is-invalid @enderror" value="{{ old('x_link', $data->x_link) }}">
												@error('x_link')
													<div class="invalid-feedback d-block">{{ $message }}</div>
												@enderror
											</div>

											<div class="form-group">
												<label for="linked_link">LinkedIn Link</label>
												<input type="url" name="linked_link" id="linked_link" class="form-control @error('linked_link') is-invalid @enderror" value="{{ old('linked_link', $data->linked_link) }}">
												@error('linked_link')
													<div class="invalid-feedback d-block">{{ $message }}</div>
												@enderror
											</div>

											<div class="form-group">
												<label for="github_link">GitHub Link</label>
												<input type="url" name="github_link" id="github_link" class="form-control @error('github_link') is-invalid @enderror" value="{{ old('github_link', $data->github_link) }}">
												@error('github_link')
													<div class="invalid-feedback d-block">{{ $message }}</div>
												@enderror
											</div>
										</div>

										<div class="col-12">
											<button type="submit" class="btn btn-info">Update Profile</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div><!-- /.container-fluid -->
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

