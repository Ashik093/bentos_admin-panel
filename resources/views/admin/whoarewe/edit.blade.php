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
	          <li class="breadcrumb-item active">Who Are We Info </li>
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
			    <h3 class="card-title">Who Are We Info</h3>
			    
			  </div>
			  <!-- /.card-header -->
			  			<div class="card-body">
			  				<form action="{{route('whoarewe.update',$data->id)}}" method="post" enctype="multipart/form-data">
			  					@csrf
			  					<div class="row">
			  						
			  						<div class="col-md-6">

                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{$data->title}}" required>
                                        </div>
                                        @error('title')
                                               <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
										   
                                       
			  						
										
			               	 			 
			  							
			  						</div>
			  						<div class="col-md-6">
                                        
										<div class="form-group">
                                            <label>Description</label>
                                            <textarea  name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{$data->description}}</textarea>
                                        </div>
                                        	@error('description')
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

