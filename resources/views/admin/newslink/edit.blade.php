@extends('layouts.app')

@section('admin_content')
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Edit News Link</h1>
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
					<h3 class="card-title">Edit News Link</h3>
				</div>
				<div class="card-body">
					<form action="{{ route('newslink.update', $data->id) }}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="title">Title <span class="text-danger">*</span></label>
									<input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $data->title) }}" required>
									@error('title')
										<div class="invalid-feedback d-block">{{ $message }}</div>
									@enderror
								</div>

								<div class="form-group">
									<label for="link">Link <span class="text-danger">*</span></label>
									<input type="url" name="link" id="link" class="form-control @error('link') is-invalid @enderror" value="{{ old('link', $data->link) }}" required>
									@error('link')
										<div class="invalid-feedback d-block">{{ $message }}</div>
									@enderror
								</div>

								<div class="form-group">
									<label for="newspaper_name">Newspaper Name</label>
									<input type="text" name="newspaper_name" id="newspaper_name" class="form-control @error('newspaper_name') is-invalid @enderror" value="{{ old('newspaper_name', $data->newspaper_name) }}">
									@error('newspaper_name')
										<div class="invalid-feedback d-block">{{ $message }}</div>
									@enderror
								</div>

								<div class="form-group">
									<label for="published_at">Published At</label>
									<input type="date" name="published_at" id="published_at" class="form-control @error('published_at') is-invalid @enderror" value="{{ old('published_at', $data->published_at ? \Carbon\Carbon::parse($data->published_at)->format('Y-m-d') : '') }}">
									@error('published_at')
										<div class="invalid-feedback d-block">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label for="thumbnail">Thumbnail</label>
									<div class="mb-2">
										@if($data->thumbnail)
											<img id="image" src="{{ asset($data->thumbnail) }}" alt="thumbnail" style="max-width:150px; max-height:150px; display:block;" />
										@else
											<img id="image" src="" alt="" style="max-width:150px; max-height:150px; display:none;" />
										@endif
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
								<button type="submit" class="btn btn-info">Update News Link</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>

@endsection()
