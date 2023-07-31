@extends('layout.master')

@section('content')

<div class="container mt-5">
    <div class="card">
    
        <div class="card-body text-center">
            <h5 class="card-title">Balance</h5>
            <p class="card-text">{{$balance}}</p>
            
        </div>
    </div>
</div>
<div>
    <h5 class="text-center"> Transection list</h5>
</div>
<table id="example" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Transection ID</th>
                <th>Transection Type</th>
                <th>Fee</th>
                <th>Amount</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($depositeList as  $deposite)
                
            <tr>
                <td>{{$deposite->id}}</td>
                <td>{{$deposite->transection_type}}</td>
                <td>{{$deposite->fee}}</td>
                <td>{{$deposite->amount}}</td>
                <td>{{$deposite->date}}</td>
                
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection

@section('script')
<script>

  


    var table = $('#example').DataTable({

        processing: true,
        serverSide: true,
        order: [[1,'desc']],
        lengthMenu: [[5, 10, 20, 50, 75, 100, 200, 500, 1000, -1], [5, 10, 20, 50, 75, 100, 200, 500, 1000, 'All']],
        pageLength: 20,
        ajax: {
            url: "{{ route('transection.ajax-list') }}",
            type: "GET"
        },
        globalSearch: true,
        columns: [

            {data: 'id', name: 'id'},
            {data: 'transection_type', name: 'transection_type'},
            {data: 'fee', name: 'fee'},
            {data: 'ammount', name: 'ammount'},
            {data: 'date', name: 'date'},
        ],

        dom: 'lBfrtip',
        
    });

   $(document).ready(function() {
         table.draw()
    });
</script>
@endsection