@extends('layouts.app')
@extends('layouts.app')

@section('admin_content')
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Companies</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
						<li class="breadcrumb-item active">Companies</li>
					</ol>
				</div>
			</div>
		</div>
	</div>

	<section class="content">
		<div class="container-fluid">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">Company List</h3>
					<a href="{{ route('company.create') }}" class="btn btn-sm btn-success float-right">Create Company</a>
				</div>

				<div class="card-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Logo</th>
								<th>Name</th>
								<th>Website</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($data as $row)
								<tr>
									<td>
										@if($row->logo)
											<img src="{{ asset($row->logo) }}" alt="logo" style="width:60px;height:60px;object-fit:cover;border-radius:4px;">
										@else
											<div style="width:60px;height:60px;background:#f0f0f0;border-radius:4px;display:flex;align-items:center;justify-content:center;color:#888;">N/A</div>
										@endif
									</td>
									<td>{{ $row->name }}</td>
									<td>
										@if($row->website)
											<a href="{{ $row->website }}" target="_blank">{{ $row->website }}</a>
										@else
											-
										@endif
									</td>
									<td>
										<div class="btn-group">
											<a href="{{ route('company.edit', $row->id) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
											<a href="{{ route('company.delete', $row->id) }}" class="btn btn-sm btn-danger" id="delete"><i class="fa fa-trash"></i></a>
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