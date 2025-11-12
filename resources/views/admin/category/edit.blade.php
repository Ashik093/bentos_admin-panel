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
	          <li class="breadcrumb-item active">Category</li>
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
			    <h3 class="card-title">Category</h3>
			    
			  </div>
			  <!-- /.card-header -->
			  			<div class="card-body">
			  				<form action="{{route('category.update',$data->id)}}" method="post" enctype="multipart/form-data">
			  					@csrf
			  					<div class="row">
			  						
			  						<div class="col-md-6">

                                        <div class="form-group">
                                            <label>Category Name</label>
                                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{$data->name}}" required>
                                        </div>
                                        @error('name')
                                               <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror

										   
										   
			               	 			 
			  							
			  						</div>
			  						
									
			  					<div class="col-12">
									<button type="submit" class="btn btn-info">Update</button>
								</div>
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

