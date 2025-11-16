@extends('layouts.app')

@section('admin_content')
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">News Links</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
						<li class="breadcrumb-item active">News Links</li>
					</ol>
				</div>
			</div>
		</div>
	</div>

	<section class="content">
		<div class="container-fluid">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">News Link List</h3>
					<a href="{{ route('newslink.create') }}" class="btn btn-sm btn-success float-right">Create News Link</a>
				</div>

				<div class="card-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Thumbnail</th>
								<th>Title</th>
								<th>Link</th>
								<th>Newspaper Name</th>
								<th>Published At</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($data as $row)
								<tr>
									<td>
										@if($row->thumbnail)
											<img src="{{ asset($row->thumbnail) }}" alt="thumbnail" style="width:100px;height:60px;object-fit:cover;border-radius:4px;">
										@else
											<div style="width:100px;height:60px;background:#f0f0f0;border-radius:4px;display:flex;align-items:center;justify-content:center;color:#888;">N/A</div>
										@endif
									</td>
									<td>{{ $row->title }}</td>
									<td>
										@if($row->link)
											<a href="{{ $row->link }}" target="_blank">{{ Str::limit($row->link, 30) }}</a>
										@else
											-
										@endif
									</td>
									<td>{{ $row->newspaper_name ?? '-' }}</td>
									<td>{{ $row->published_at ? \Carbon\Carbon::parse($row->published_at)->format('d M Y') : '-' }}</td>
									<td>
										<div class="btn-group">
											<a href="{{ route('newslink.edit', $row->id) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
											<a href="{{ route('newslink.delete', $row->id) }}" class="btn btn-sm btn-danger" id="delete"><i class="fa fa-trash"></i></a>
										</div>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<!-- /.card-body -->
			</div>
		</div><!-- /.container-fluid -->
	</section>
@endsection()
