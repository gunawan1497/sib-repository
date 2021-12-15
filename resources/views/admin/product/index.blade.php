{{-- @dd ($products) --}}

@extends('admin.admin')
@section('title', 'product')
@section('content-title')
<div class="row mb-2">
     <div class="col-sm-6">
       <h1 class="m-0">Product</h1>
     </div><!-- /.col -->
     <div class="col-sm-6">
       <ol class="breadcrumb float-sm-right">
         <li class="breadcrumb-item active">Product</li>
       </ol>
     </div><!-- /.col -->
   </div><!-- /.row -->
@endsection
@section('content')
<div class="row">
     <div class="col">

          @if (session('success'))
               <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert">
                         <span>&times;</span>
                    </button>
               </div>
          @elseif (session('failed'))
               <div class="alert alert-success alert-dismissible fade show">
                    {{ session('failed') }}
                    <button type="button" class="close" data-dismiss="alert">
                         <span>&times;</span>
                    </button>
               </div>
          @endif

          <div class="card">
               <div class="card-header">
                    <h3 class="card-title">Product</h3>
                    <div class="card-tools">
                         <a href="{{ url('admin/product/create') }}" class="btn btn-tool">
                              <i class="fas fa-plus"></i>
                              Add data
                         </a>
                    </div>
               </div>
               <div class="card-body">

                    <div class="row">
                         <div class="col">
                              <div class="form-group">
                                   {{ Form::label('category') }}
                                   {{ Form::select('category', $categories, $filterCategory, ['class' => 'form-control', 'placeholder' => 'Choose category']) }}
                              </div>
                         </div>
                         <div class="col">
                              <div class="form-group">
                                   {{ Form::label('search') }}
                                   {{ Form::text('search', $filterSearch, ['class' => 'form-control', 'placeholder' => 'Search']) }}
                              </div>
                         </div>

                    </div>

                    <table class="table table-bordered">
                         <thead>
                              <tr>
                                   <th>ID</th>
                                   <th>Category</th>
                                   <th>Name</th>
                                   <th>Price</th>
                                   <th>SKU</th>
                                   <th>Image</th>
                                   <th>Status</th>
                                   <th style="width: 100px">Action</th>
                              </tr>
                         </thead>
                         <tbody>
                              @foreach ($products as $product)
                                  <tr>
                                       <td>{{ $product->id }}</td>
                                       <td>{{ $product->getCategory->name }}</td>
                                       <td>{{ $product->name }}</td>
                                       <td>{{ $product->price }}</td>
                                       <td>{{ $product->sku }}</td>
                                       <td>
                                            @if (!empty($product->image))
                                            <img src="{{ asset('storage/product/' . $product->image) }}" height="100" alt="">
                                            @else
                                                  Tidak ada gambar                                                
                                            @endif
                                       </td>
                                       <td>{{ $product->status }}</td>
                                       <td>
                                            {{-- <form action="{{ route('product.destroy', ['product' => $product->id]) }}" method="POST">
                                                  @csrf
                                                  @method('delete') --}}
                                             {{ Form::open(['route' => ['product.destroy', $product->id], 'method' => 'delete']) }}
                                                  <div class="btn-group">
                                                       <a href="{{ route('product.show', ['product' => $product->id]) }}" class="btn btn-info">
                                                            <i class="fas fa-eye"></i>
                                                       </a>
                                                       <a href="{{ route('product.edit', ['product' => $product->id]) }}" class="btn btn-warning">
                                                            <i class="fas fa-pen"></i>
                                                       </a>
                                                       <button type="submit" class="btn btn-danger">
                                                            <i class="fas fa-trash"></i>
                                                       </button>
                                                  </div>
                                            {{ form::close() }}
                                       </td>
                                  </tr>
                              @endforeach
                         </tbody>
                    </table>
               </div>
               <div class="card-footer">
                    {{ $products->appends($_GET)->links() }}
               </div>
          </div>
     </div>
</div>
@endsection

@section('script')
     <script>

          var filter = function () {
               var category = $('#category').val();
               var search = $('#search').val();

               window.location.replace("{{ route('product.index') }}?category=" + category + "&search=" + search);
          }

          $('#category').on('change', function () {
               filter();
          });

          $('#search').keypress(function (event) {
               if (event.keyCode == 13) {
                    filter();
               }
          });

     </script>
    
@endsection
