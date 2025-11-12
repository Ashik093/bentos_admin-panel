@extends('layouts.app')

@section('admin_content')
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">

	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
	          <li class="breadcrumb-item active">Change Password</li>
	        </ol>
	      </div><!-- /.col -->
	    </div><!-- /.row -->
	  </div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
	  <div class="container-fluid">
	    <!-- Small boxes (Stat box) -->
			<div class="card">
			  <div class="card-header bg-info">
			    <h3 class="card-title">Change Password</h3>
			    
			  </div>
			  <!-- /.card-header -->
			  			<div class="card-body">
			  				<form action="{{ route('update.password') }}" method="post">
			  					@csrf
			  					<div class="row">
			  						<div class="col-md-3"></div>
			  						<div class="col-md-6">
			  							
			               	 			 <div class="form-group">
			  								<label>Enter New Password</label>
			  								<input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter New Password">
			  							</div>
			  							@error('password')
			               	      			<div class="alert alert-danger">{{ $message }}</div>
			               	 			 @enderror
											 <div class="form-group">
												<label>Retype New Password</label>
												<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Retype New Password">
											</div>
											
			  							<button type="submit" class="btn btn-info">Change</button>
			  						</div>
			  						<div class="col-md-3"></div>
			  						
			  					
			  				</form>
			  			</div>
			  <!-- /.card-body -->
			</div>
	    <!-- /.row -->
	    <!-- Main row -->
	    <!-- /.row (main row) -->
	  </div><!-- /.container-fluid -->
	</section>
@endsection()

