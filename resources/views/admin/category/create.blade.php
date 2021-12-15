@extends('admin.admin')
@section('title', 'category')
@section('content-title')
<div class="row mb-2">
     <div class="col-sm-6">
       <h1 class="m-0">Create Category</h1>
     </div><!-- /.col -->
     <div class="col-sm-6">
       <ol class="breadcrumb float-sm-right">
         <li class="breadcrumb-item active">Category</li>
       </ol>
     </div><!-- /.col -->
   </div><!-- /.row -->
@endsection
@section('content')
<div class="row">
     <div class="col">
          <form action="{{ url('admin/category') }}" method="POST">
          @csrf
               <div class="card">
               <div class="card-header">
                    <h3 class="card-title">add category</h3>
               </div>
               <div class="card-body">
                    <div class="form-group">
                         <label>Category</label>
                         <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Enter category">
                         @error('name')
                              <small class="text-danger">{{ $message }}</small>                             
                         @enderror
                    </div>

                    <div class="form-group">
                         <label>Status</label>
                         <select name="status" class="form-control">
                              <option value="">Choose status.. </option>
                              <option value="active" @if (old('status') == 'active') selected
                              @endif>Active</option>
                              <option value="inactive" @if (old('status') == 'inactive') selected
                              @endif>Inactive</option>
                         </select>
                         @error('status')
                              <small class="text-danger">{{ $message }}</small>                             
                         @enderror
                    </div>
               </div>
               <div class="card-footer">
                    <a href="{{ url("admin/category") }}" class="btn btn-outline-info">Back</a>
                    <button type="submit" class="btn btn-primary float-right">Add Category</button>
               </div>
          </div>
     </div>
</div>
@endsection