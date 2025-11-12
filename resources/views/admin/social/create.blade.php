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
	          <li class="breadcrumb-item active">Social Link</li>
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
			    <h3 class="card-title">Social Link</h3>
			    
			  </div>
			  <!-- /.card-header -->
			  			<div class="card-body">
			  				<form action="{{route('social.link.store')}}" method="post" enctype="multipart/form-data">
			  					@csrf
			  					<div class="row">
			  						
			  						<div class="col-md-6">

                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" required>
                                        </div>
                                        @error('name')
                                               <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
										   <div class="form-group">
												
											<label for="exampleInputFile">Icon</label>
											<div class="input-group">
												<img src="" alt="" id="image" style="width: 40px;height: 40px;">
												<div class="custom-file">
													<input type="file"  accept="image/*" name="icon"  class="custom-file-input" id="exampleInputFile" onchange="readURL(this);" >
													<label class="custom-file-label" for="exampleInputFile">Choose file</label>
												</div>
											</div>
										</div>
                                        @error('icon')
                                               <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
			  						
										   
			               	 			 
			  							
			  						</div>
			  						<div class="col-md-6">
                                        <div class="form-group">
                                            <label>Link</label>
                                            <input type="text" name="link" id="link" class="form-control @error('link') is-invalid @enderror" value="{{old('link')}}" required>
                                        </div>
                                        @error('link')
                                               <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
										
			  						</div>
									  <div class="col-md-12">
										<button type="submit" class="btn btn-info">Save</button>
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

