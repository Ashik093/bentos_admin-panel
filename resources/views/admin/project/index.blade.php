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
			  <div class="card-header">
			    <h3 class="card-title">Project</h3>
				<a href="{{route('project.create')}}" class="btn btn-sm btn-success float-right" >Create Project</a>
			    
                
			  </div>
			  <!-- /.card-header -->
			  <div class="card-body">
			    <table id="example1" class="table table-bordered table-striped">
			      <thead>
			      <tr>
			        <th>Title</th>
			        <th>Description</th>
			        <th>More Description</th>
			        <th>Images</th>
			        <th>Action</th>
			       
			        
			      </tr>
			      </thead>
			      <tbody>
					@foreach($data as $row)
						<tr>
							<td>{{$row->title}}</td>
							<td>{{$row->description}}</td>
							<td>{{$row->extra_description}}</td>
							
							<td>
								<img width="100" style="margin-right:3px;" src="{{URL::to($row->image)}}" alt="">	
							</td>
							<td><div class="btn-group">
								<a href="{{route('project.edit',$row->id)}}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a><a href="{{route('project.delete',$row->id)}}" class="btn btn-sm btn-danger" id="delete"><i class="fa fa-trash"></i></a>	
							</div></td>
						</tr>
					@endforeach
			      </tbody>
			      
			    </table>
			  </div>
			  <!-- /.card-body -->
			</div>
	    <!-- /.row -->
	    <!-- Main row -->
	    <!-- /.row (main row) -->
	  </div><!-- /.container-fluid -->
	</section>
@endsection()