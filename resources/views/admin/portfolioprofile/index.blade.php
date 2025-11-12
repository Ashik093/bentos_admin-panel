@extends('layouts.app')

@section('admin_content')
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0">Profiles</h1>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
							<li class="breadcrumb-item active">Profiles</li>
						</ol>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.container-fluid -->
		</div>

		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Profile List</h3>
						<a href="{{ route('portfolioprofile.create') }}" class="btn btn-sm btn-success float-right">Create Profile</a>
					</div>

					<div class="card-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Photo</th>
									<th>Name</th>
									<th>Role</th>
									<th>Available</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($data as $row)
									<tr>
										<td>
											@if($row->profile_photo)
												<img src="{{ asset($row->profile_photo) }}" alt="photo" style="width:50px;height:50px;object-fit:cover;border-radius:4px;">
											@else
												<div style="width:50px;height:50px;background:#f0f0f0;border-radius:4px;display:flex;align-items:center;justify-content:center;color:#888;">N/A</div>
											@endif
										</td>
										<td>{{ $row->name }}</td>
										<td>{{ $row->role }}</td>
										<td>{{ $row->available_for_freelance ? 'Yes' : 'No' }}</td>
										<td>
											<div class="btn-group">
												<a href="{{ route('portfolioprofile.edit', $row->id) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
												<a href="{{ route('portfolioprofile.delete', $row->id) }}" class="btn btn-sm btn-danger" id="delete"><i class="fa fa-trash"></i></a>
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