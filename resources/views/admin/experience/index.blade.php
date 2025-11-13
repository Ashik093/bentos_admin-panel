@extends('layouts.app')

@section('admin_content')
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Experiences</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
						<li class="breadcrumb-item active">Experiences</li>
					</ol>
				</div>
			</div>
		</div>
	</div>

	<section class="content">
		<div class="container-fluid">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">Experience List</h3>
					<a href="{{ route('experience.create') }}" class="btn btn-sm btn-success float-right">
						<i class="fas fa-plus"></i> Add Experience
					</a>
				</div>

				<div class="card-body">
					
						<table id="example1" class="table table-bordered table-striped table-hover">
							<thead class="thead-light">
								<tr>
									<th>#</th>
									<th>Job Title</th>
									<th>Company</th>
									<th>Period</th>
									<th>Status</th>
									<th>Description</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($data as $key => $row)
									<tr>
										<td>{{ $key + 1 }}</td>
										<td>
											<strong>{{ $row->title }}</strong>
										</td>
										<td>{{ $row->company_name }}</td>
										<td>
											<span class="badge badge-primary">{{ $row->start_year }}</span>
											@if($row->end_year)
												<span>-</span>
												<span class="badge badge-warning">{{ $row->end_year }}</span>
											@else
												<span class="badge badge-success">Present</span>
											@endif
										</td>
										<td>
											@if($row->is_current)
												<span class="badge badge-success">
													<i class="fas fa-check-circle"></i> Current
												</span>
											@else
												<span class="badge badge-secondary">
													<i class="fas fa-times-circle"></i> Past
												</span>
											@endif
										</td>
										<td>
											@if($row->description)
												<small class="text-muted">{{ Str::limit($row->description, 50) }}</small>
											@else
												<span class="text-muted">-</span>
											@endif
										</td>
										<td>
											<div class="btn-group btn-group-sm" role="group">
												<a href="{{ route('experience.edit', $row->id) }}" class="btn btn-info" title="Edit">
													<i class="fas fa-edit"></i>
												</a>
												<a href="{{ route('experience.delete', $row->id) }}" class="btn btn-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this experience?');">
													<i class="fas fa-trash"></i>
												</a>
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