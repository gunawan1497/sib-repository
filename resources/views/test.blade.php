{{-- <!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Test view</title>
</head>
<body>

     <h1>My first heading</h1>
     <p>My firs paragraf</p>
     <p>{{ $nama }}</p>
     <p>{{ $umur }}</p>
</body>
</html> --}}

@extends('admin.admin')
@section('content')
     <h1>My first heading</h1>
     <p>My firs paragraf</p>
@endsection
@section('content-title')
<div class="row mb-2">
     <div class="col-sm-6">
       <h1 class="m-0">Test</h1>
     </div><!-- /.col -->
     <div class="col-sm-6">
       <ol class="breadcrumb float-sm-right">
         <li class="breadcrumb-item"><a href="#">Home</a></li>
         <li class="breadcrumb-item active">Test</li>
       </ol>
     </div><!-- /.col -->
   </div><!-- /.row -->
@endsection