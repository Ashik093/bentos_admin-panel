@extends('layouts.app')

@section('admin_content')
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Services</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
						<li class="breadcrumb-item active">Services</li>
					</ol>
				</div>
			</div>
		</div>
	</div>

	<section class="content">
		<div class="container-fluid">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">Service List</h3>
					<a href="{{ route('service.create') }}" class="btn btn-sm btn-success float-right"><i class="fas fa-plus"></i> Add Service</a>
				</div>

				<div class="card-body">

						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>#</th>
									<th>Title</th>
									<th>Description</th>
									<th>Icon</th>
									<th>Order</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($data as $key => $row)
									<tr>
										<td>{{ $key + 1 }}</td>
										<td>{{ $row->title }}</td>
										<td>
											<span title="{{ $row->description }}">
												{{ Str::limit($row->description, 50) }}
											</span>
										</td>
										<td>{{ $row->icon ?? 'N/A' }}</td>
										<td>{{ $row->order ?? 'N/A' }}</td>
										<td>
											<div class="btn-group">
												<a href="{{ route('service.edit', $row->id) }}" class="btn btn-sm btn-info" title="Edit"><i class="fa fa-edit"></i></a>
												<a href="{{ route('service.delete', $row->id) }}" class="btn btn-sm btn-danger" id="delete" title="Delete"><i class="fa fa-trash"></i></a>
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
@endsection
