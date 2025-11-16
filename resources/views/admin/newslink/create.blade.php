@extends('layouts.app')

@section('admin_content')
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Create News Link</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
						<li class="breadcrumb-item active">News Link</li>
					</ol>
				</div>
			</div>
		</div>
	</div>

	<section class="content">
		<div class="container-fluid">
			<div class="card">
				<div class="card-header bg-info">
					<h3 class="card-title">New News Link</h3>
				</div>
				<div class="card-body">
					<form action="{{ route('newslink.store') }}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="title">Title <span class="text-danger">*</span></label>
									<input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
									@error('title')
										<div class="invalid-feedback d-block">{{ $message }}</div>
									@enderror
								</div>

								<div class="form-group">
									<label for="link">Link <span class="text-danger">*</span></label>
									<input type="url" name="link" id="link" class="form-control @error('link') is-invalid @enderror" value="{{ old('link') }}" required>
									@error('link')
										<div class="invalid-feedback d-block">{{ $message }}</div>
									@enderror
								</div>

								<div class="form-group">
									<label for="newspaper_name">Newspaper Name</label>
									<input type="text" name="newspaper_name" id="newspaper_name" class="form-control @error('newspaper_name') is-invalid @enderror" value="{{ old('newspaper_name') }}">
									@error('newspaper_name')
										<div class="invalid-feedback d-block">{{ $message }}</div>
									@enderror
								</div>

								<div class="form-group">
									<label for="published_at">Published At</label>
									<input type="date" name="published_at" id="published_at" class="form-control @error('published_at') is-invalid @enderror" value="{{ old('published_at') }}">
									@error('published_at')
										<div class="invalid-feedback d-block">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label for="thumbnail">Thumbnail</label>
									<div class="mb-2">
										<img id="image" src="" alt="" style="max-width:150px; max-height:150px; display:none;" />
									</div>
									<div class="custom-file">
										<input type="file" name="thumbnail" id="thumbnail" accept="image/*" class="custom-file-input @error('thumbnail') is-invalid @enderror" onchange="readURL(this);">
										<label class="custom-file-label" for="thumbnail">Choose thumbnail</label>
									</div>
									@error('thumbnail')
										<div class="invalid-feedback d-block">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-12">
								<button type="submit" class="btn btn-info">Save News Link</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>

@endsection()
