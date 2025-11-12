@extends('layouts.app')

@section('admin_content')
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Edit Company</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
						<li class="breadcrumb-item active">Company</li>
					</ol>
				</div>
			</div>
		</div>
	</div>

	<section class="content">
		<div class="container-fluid">
			<div class="card">
				<div class="card-header bg-info">
					<h3 class="card-title">Edit Company</h3>
				</div>
				<div class="card-body">
					<form action="{{ route('company.update', $data->id) }}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="name">Company Name <span class="text-danger">*</span></label>
									<input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $data->name) }}" required>
									@error('name')
										<div class="invalid-feedback d-block">{{ $message }}</div>
									@enderror
								</div>

								<div class="form-group">
									<label for="website">Website</label>
									<input type="url" name="website" id="website" class="form-control @error('website') is-invalid @enderror" value="{{ old('website', $data->website) }}">
									@error('website')
										<div class="invalid-feedback d-block">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label for="logo">Company Logo</label>
									<div class="mb-2">
										@if($data->logo)
											<img id="image" src="{{ asset($data->logo) }}" alt="logo" style="max-width:150px; max-height:150px; display:block;" />
										@else
											<img id="image" src="" alt="" style="max-width:150px; max-height:150px; display:none;" />
										@endif
									</div>
									<div class="custom-file">
										<input type="file" name="logo" id="logo" accept="image/*" class="custom-file-input @error('logo') is-invalid @enderror" onchange="readURL(this);">
										<label class="custom-file-label" for="logo">Choose logo</label>
									</div>
									@error('logo')
										<div class="invalid-feedback d-block">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-12">
								<button type="submit" class="btn btn-info">Update Company</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>

@endsection()

*** End Patch

