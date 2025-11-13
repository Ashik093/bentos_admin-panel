@extends('layouts.app')

@section('admin_content')
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Testimonials</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
						<li class="breadcrumb-item active">Testimonials</li>
					</ol>
				</div>
			</div>
		</div>
	</div>

	<section class="content">
		<div class="container-fluid">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">Testimonial List</h3>
					<a href="{{ route('testimonial.create') }}" class="btn btn-sm btn-success float-right"><i class="fas fa-plus"></i> Add Testimonial</a>
				</div>

				<div class="card-body">
				
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>#</th>
									<th>Photo</th>
									<th>Client Name</th>
									<th>Position</th>
									<th>Message</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($data as $key => $row)
									<tr>
										<td>{{ $key + 1 }}</td>
										<td>
											@if($row->photo)
												<img src="{{ asset($row->photo) }}" alt="photo" style="width:50px;height:50px;object-fit:cover;border-radius:4px;">
											@else
												<div style="width:50px;height:50px;background:#f0f0f0;border-radius:4px;display:flex;align-items:center;justify-content:center;color:#888;">N/A</div>
											@endif
										</td>
										<td>{{ $row->client_name }}</td>
										<td>{{ $row->client_position ?? 'N/A' }}</td>
										<td>
											<span title="{{ $row->message }}">
												{{ Str::limit($row->message, 50) }}
											</span>
										</td>
										<td>
											<div class="btn-group">
												<a href="{{ route('testimonial.edit', $row->id) }}" class="btn btn-sm btn-info" title="Edit"><i class="fa fa-edit"></i></a>
												<a href="{{ route('testimonial.delete', $row->id) }}" class="btn btn-sm btn-danger" id="delete" title="Delete"><i class="fa fa-trash"></i></a>
											</div>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					
				</div>
			</div>
		</div>
	</section>
@endsection()