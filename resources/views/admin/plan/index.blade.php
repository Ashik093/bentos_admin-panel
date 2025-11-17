@extends('layouts.app')

@section('admin_content')
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Plans</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
						<li class="breadcrumb-item active">Plans</li>
					</ol>
				</div>
			</div>
		</div>
	</div>

	<section class="content">
		<div class="container-fluid">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">Plan List</h3>
					<a href="{{ route('plan.create') }}" class="btn btn-sm btn-success float-right"><i class="fas fa-plus"></i> Add Plan</a>
				</div>

				<div class="card-body">

						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Subtitle</th>
									<th>Price</th>
									<th>Per</th>
									<th>Features</th>
									<th>Popular</th>
									<th>Button Label</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($data as $key => $row)
									<tr>
										<td>{{ $key + 1 }}</td>
										<td>{{ $row->name }}</td>
										<td>{{ $row->subtitle ?? 'N/A' }}</td>
										<td>{{ $row->currency_symbol }}{{ $row->price }}</td>
										<td>{{ $row->per ?? 'N/A' }}</td>
										<td>
											{{ $row->features }}
										</td>
										<td>
											@if($row->is_popular)
												<span class="badge badge-success">Yes</span>
											@else
												<span class="badge badge-secondary">No</span>
											@endif
										</td>
										<td>{{ $row->button_label ?? 'N/A' }}</td>
										<td>
											<div class="btn-group">
												<a href="{{ route('plan.edit', $row->id) }}" class="btn btn-sm btn-info" title="Edit"><i class="fa fa-edit"></i></a>
												<a href="{{ route('plan.delete', $row->id) }}" class="btn btn-sm btn-danger" id="delete" title="Delete"><i class="fa fa-trash"></i></a>
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
