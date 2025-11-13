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
	          <li class="breadcrumb-item active">Project</li>
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
			    <h3 class="card-title">Project</h3>

			  </div>
			  <!-- /.card-header -->
			  			<div class="card-body">
			  				<form action="{{route('project.update',$data->id)}}" method="post" enctype="multipart/form-data">
			  					@csrf
			  					<div class="row">

			  						<div class="col-md-6">
										<div class="form-group">
											<label>Project Title</label>
											<input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{old('title', $data->title)}}" required>
										</div>
										@error('title')
											   <div class="alert alert-danger">{{ $message }}</div>
										   @enderror

										   <div class="form-group">
                                            <label>Extra Description</label>
                                            <textarea  name="extra_description" id="extra_description" class="form-control @error('extra_description') is-invalid @enderror">{{old('extra_description', $data->extra_description)}}</textarea>
                                        </div>
                                        	@error('extra_description')
                                               <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror

                                           <div class="form-group">
                                            <label>Year</label>
                                            <input type="number" name="year" id="year" class="form-control @error('year') is-invalid @enderror" value="{{old('year', $data->year)}}" min="1900" max="{{ date('Y') + 10 }}">
                                        </div>
                                        	@error('year')
                                               <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror

                                           <div class="form-group">
                                            <label>Client</label>
                                            <input type="text" name="client" id="client" class="form-control @error('client') is-invalid @enderror" value="{{old('client', $data->client)}}">
                                        </div>
                                        	@error('client')
                                               <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror


			  						</div>
			  						<div class="col-md-6">


                                            <div class="form-group">

												<label for="exampleInputFile">Project Image</label>
												<div class="input-group">
													<img src="{{URL::to($data->image)}}" alt="" id="image" style="width: 40px;height: 40px;">
													<div class="custom-file">
														<input type="file"  accept="image/*" name="image"  class="custom-file-input" id="exampleInputFile" onchange="readURL(this);" >
														<label class="custom-file-label" for="exampleInputFile">Choose file</label>
													</div>
												</div>
											</div>
											@error('image')
												<div class="alert alert-danger">{{ $message }}</div>
											@enderror
											<div class="form-group">
												<label>Description</label>
												<textarea  name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{old('description', $data->description)}}</textarea>
											</div>
												@error('description')
												   <div class="alert alert-danger">{{ $message }}</div>
											   @enderror

                                               <div class="form-group">
                                                <label>Service</label>
                                                <input type="text" name="service" id="service" class="form-control @error('service') is-invalid @enderror" value="{{old('service', $data->service)}}">
                                            </div>
                                            	@error('service')
                                                   <div class="alert alert-danger">{{ $message }}</div>
                                               @enderror

                                               <div class="form-group">
                                                <label>Project</label>
                                                <input type="text" name="project" id="project" class="form-control @error('project') is-invalid @enderror" value="{{old('project', $data->project)}}">
                                            </div>
                                            	@error('project')
                                                   <div class="alert alert-danger">{{ $message }}</div>
                                               @enderror

                                               <div class="form-group">
                                                <label>Category</label>
                                                <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                                    <option value="">Select Category</option>
                                                    @foreach(\App\Models\Category::all() as $category)
                                                        <option value="{{ $category->id }}" {{ old('category_id', $data->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            	@error('category_id')
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
