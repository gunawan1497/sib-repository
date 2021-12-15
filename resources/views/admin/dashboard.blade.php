@extends('admin.admin')
@section('title', 'dashboard')
@section('content-title')
<div class="row mb-2">
     <div class="col-sm-6">
       <h1 class="m-0">Dashboard</h1>
     </div><!-- /.col -->
     <div class="col-sm-6">
       <ol class="breadcrumb float-sm-right">
         <li class="breadcrumb-item"><a href="#">Home</a></li>
         <li class="breadcrumb-item active">Dashboard</li>
       </ol>
     </div><!-- /.col -->
   </div><!-- /.row -->
@endsection
@section('content')
<div class="row">
     <div class="col">
               <div class="card">
               <div class="card-header">
                    <h3 class="card-title">Sales Graph</h3>
               </div>
               <div class="card-body">
                    <canvas id="sales-chart" width="400" height="400"></canvas>
               </div>
          </div>
     </div>
     <div class="col">
          <div class="card">
               <div class="card-header">
                    <h3 class="card-title">Latest Transaction</h3>
               </div>
               <div class="card-body">
                    
                    <table class="table table-bordered">
                         <thead>
                              <tr>
                                   <th>NO</th>
                                   <th>Product</th>
                                   <th>Date</th>
                                   <th>Price</th>
                              </tr>
                         </thead>
                         <tbody>
                              {{-- @php
                                   $no =1;    
                              @endphp --}}
                              @foreach ($transactions as $transaction)
                                  <tr>
                                       {{-- <td>{{ $no++ }}</td> --}}
                                       <td>{{ $loop->iteration }}</td>
                                       <td>{{ $transaction->product->name }}</td>
                                       <td>{{ $transaction->trx_date }}</td>
                                       <td>{{ $transaction->price }}</td>
                                       
                                  </tr>
                              @endforeach
                         </tbody>
                    </table>
               </div>
          </div>
     </div>
</div>
@endsection

@section('script')
<script>
     const ctx = document.getElementById('sales-chart').getContext('2d');
     const myChart = new Chart(ctx, {
         type: 'line',
         data: {
             labels: {!! json_encode($months) !!},
             datasets: [{
                 label: 'Overral Sales',
                 data: {!! json_encode($data) !!},
                 backgroundColor: [
                     'rgba(255, 99, 132, 0.2)',
                     'rgba(54, 162, 235, 0.2)',
                     'rgba(255, 206, 86, 0.2)',
                     'rgba(75, 192, 192, 0.2)',
                     'rgba(153, 102, 255, 0.2)',
                     'rgba(255, 159, 64, 0.2)'
                 ],
                 borderColor: [
                     'rgba(255, 99, 132, 1)',
                     'rgba(54, 162, 235, 1)',
                     'rgba(255, 206, 86, 1)',
                     'rgba(75, 192, 192, 1)',
                     'rgba(153, 102, 255, 1)',
                     'rgba(255, 159, 64, 1)'
                 ],
                 borderWidth: 1
             }]
         },
         options: {
             scales: {
                 y: {
                     beginAtZero: true
                 }
             }
         }
     });
     </script>
@endsection