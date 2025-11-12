@extends('layouts.app')

@section('admin_content')
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0">Create Profile</h1>
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
						<h3 class="card-title">New Profile</h3>
					</div>
					<div class="card-body">
						<form action="{{ route('portfolioprofile.store') }}" method="post" enctype="multipart/form-data">
							@csrf
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="name">Name <span class="text-danger">*</span></label>
										<input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
										@error('name')
											<div class="invalid-feedback d-block">{{ $message }}</div>
										@enderror
									</div>

									<div class="form-group">
										<label for="role">Role</label>
										<input type="text" name="role" id="role" class="form-control @error('role') is-invalid @enderror" value="{{ old('role') }}">
										@error('role')
											<div class="invalid-feedback d-block">{{ $message }}</div>
										@enderror
									</div>

									<div class="form-group">
										<label for="short_description">Short Description</label>
										<textarea name="short_description" id="short_description" class="form-control @error('short_description') is-invalid @enderror" rows="3">{{ old('short_description') }}</textarea>
										@error('short_description')
											<div class="invalid-feedback d-block">{{ $message }}</div>
										@enderror
									</div>

									<div class="form-group">
										<label for="long_description">Long Description</label>
										<textarea name="long_description" id="long_description" class="form-control @error('long_description') is-invalid @enderror" rows="5">{{ old('long_description') }}</textarea>
										@error('long_description')
											<div class="invalid-feedback d-block">{{ $message }}</div>
										@enderror
									</div>

									<div class="form-group">
										<label for="bio">Bio</label>
										<textarea name="bio" id="bio" class="form-control @error('bio') is-invalid @enderror" rows="3">{{ old('bio') }}</textarea>
										@error('bio')
											<div class="invalid-feedback d-block">{{ $message }}</div>
										@enderror
									</div>

									<div class="form-group">
										<label for="location">Location</label>
										<input type="text" name="location" id="location" class="form-control @error('location') is-invalid @enderror" value="{{ old('location') }}">
										@error('location')
											<div class="invalid-feedback d-block">{{ $message }}</div>
										@enderror
									</div>

									<div class="form-group form-check">
										<input type="checkbox" name="available_for_freelance" id="available_for_freelance" class="form-check-input" value="1" {{ old('available_for_freelance') ? 'checked' : '' }}>
										<label class="form-check-label" for="available_for_freelance">Available for Freelance</label>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="profile_photo">Profile Photo</label>
										<div class="mb-2">
											<img id="profilePhotoPreview" src="" alt="" style="max-width:150px; max-height:150px; display:none;" />
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
										<input type="url" name="facebook_link" id="facebook_link" class="form-control @error('facebook_link') is-invalid @enderror" value="{{ old('facebook_link') }}">
										@error('facebook_link')
											<div class="invalid-feedback d-block">{{ $message }}</div>
										@enderror
									</div>

									<div class="form-group">
										<label for="x_link">X (Twitter) Link</label>
										<input type="url" name="x_link" id="x_link" class="form-control @error('x_link') is-invalid @enderror" value="{{ old('x_link') }}">
										@error('x_link')
											<div class="invalid-feedback d-block">{{ $message }}</div>
										@enderror
									</div>

									<div class="form-group">
										<label for="linked_link">LinkedIn Link</label>
										<input type="url" name="linked_link" id="linked_link" class="form-control @error('linked_link') is-invalid @enderror" value="{{ old('linked_link') }}">
										@error('linked_link')
											<div class="invalid-feedback d-block">{{ $message }}</div>
										@enderror
									</div>

									<div class="form-group">
										<label for="github_link">GitHub Link</label>
										<input type="url" name="github_link" id="github_link" class="form-control @error('github_link') is-invalid @enderror" value="{{ old('github_link') }}">
										@error('github_link')
											<div class="invalid-feedback d-block">{{ $message }}</div>
										@enderror
									</div>
								</div>

								<div class="col-12">
									<button type="submit" class="btn btn-info">Save Profile</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div><!-- /.container-fluid -->
		</section>

		

@endsection()



