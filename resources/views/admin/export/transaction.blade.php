<table>
     <thead>
          <tr>
               <th>NO</th>
               <th>ID</th>
               <th>Product name</th>
               <th>Product id</th>
               <th>Transaction date</th>
               <th>Price</th>
               <th>Created at</th>
               <th>Update at</th>
          </tr>
     </thead>
     {{-- @php
         $no=1
     @endphp --}}
     <tbody>
          @foreach ($transactions as $transaction)
              <tr>
                   <td>{{ $loop->iteration }}</td>
                   <td>{{ $transaction->id }}</td>
                   <td>{{ $transaction->product->name }}</td>
                   <td>{{ $transaction->product->id }}</td>
                   <td>{{ $transaction->trx_date }}</td>
                   <td>{{ $transaction->price }}</td>
                   <td>{{ $transaction->created_at }}</td>
                   <td>{{ $transaction->updated_at }}</td>
              </tr>
          @endforeach
     </tbody>
</table>