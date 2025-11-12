@extends('layouts.app')

@section('admin_content')


    
<div class="container">
    <div class="row ">
        <div class="col-md-4">
            <div class="card mt-4">
                <div class="card-header border-0">Total Category</div>

                <div class="card-body">
                   {{$category}}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mt-4">
                <div class="card-header border-0">Total Project</div>
                
                <div class="card-body">
                   {{$project}}
                </div>
            </div>
        </div>
        
        
    </div>
</div>
@endsection
