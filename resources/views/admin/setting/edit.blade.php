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
	          <li class="breadcrumb-item active">Setting </li>
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
			    <h3 class="card-title">Setting</h3>
			    
			  </div>
			  <!-- /.card-header -->
			  			<div class="card-body">
			  				<form action="{{route('setting.update',$data->id)}}" method="post" enctype="multipart/form-data">
			  					@csrf
			  					<div class="row">
			  						
			  						<div class="col-md-6">

                                        <div class="form-group">
												
											<label for="exampleInputFile">Logo</label>
											<div class="input-group">
												<img src="{{URL::to($data->logo)}}" alt="" id="image" style="width: 40px;height: 40px;">
												<div class="custom-file">
													<input type="file"  accept="image/*" name="logo"  class="custom-file-input" id="exampleInputFile" onchange="readURL(this);" >
													<label class="custom-file-label" for="exampleInputFile">Choose file</label>
												</div>
											</div>
										</div>
										@error('logo')
											<div class="alert alert-danger">{{ $message }}</div>
										@enderror
										   
                                       
											<div class="form-group">
													<label>Email</label>
													<input type="email" name="email" id="email" class="form-control @error('title') is-invalid @enderror" value="{{$data->email}}" required>
												</div>
												@error('email')
													   <div class="alert alert-danger">{{ $message }}</div>
												   @enderror
												   @if(auth()->user()->is_super_admin)
													<div class="form-group">
														<label>Meta Description</label>
														<input type="text" name="meta_description" id="meta_description" class="form-control @error('meta_description') is-invalid @enderror" value="{{$data->meta_description}}" required>
													</div>
													@error('meta_description')
														<div class="alert alert-danger">{{ $message }}</div>
													@enderror

													@else
													<input type="hidden" name="meta_description" id="meta_description" class="form-control @error('meta_description') is-invalid @enderror" value="{{$data->meta_description}}">
												   @endif
												   
			               	 			 
			  							
			  						</div>
			  						<div class="col-md-6">
                                        @if(auth()->user()->is_super_admin)
										<div class="form-group">
												
											<label for="exampleInputFile">Email Background Image</label>
											<div class="input-group">
												<img src="{{URL::to($data->emailbg)}}" alt="" id="image_one" style="width: 40px;height: 40px;">
												<div class="custom-file">
													<input type="file"  accept="image/*" name="emailbg"  class="custom-file-input" id="exampleInputFile" onchange="readURLOne(this);" >
													<label class="custom-file-label" for="exampleInputFile">Choose file</label>
												</div>
											</div>
										</div>
										@error('emailbg')
											<div class="alert alert-danger">{{ $message }}</div>
										@enderror
										@endif
										<div class="form-group">
                                            <label>Phone</label>
                                            <input type="text" name="phone" id="phone" class="form-control @error('title') is-invalid @enderror" value="{{$data->phone}}" required>
                                        </div>
                                        	@error('phone')
                                               <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
										   <div class="form-group">
                                            <label>Site Title</label>
                                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{$data->title}}" required>
                                        </div>
                                        	@error('title')
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

