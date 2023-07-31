@extends('layout.master')

@section('content')

@include('modals.withdraw-modal')
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    
@endif
<div>
    <h5 class="text-center"> Deposite list</h5>
</div>

<button class="btn btn-success" onclick="openModal()">Withdraw balance</button>
<br>
<table id="withdraw-table" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Transection ID</th>
                <th>Fee</th>
                <th>Ammount</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($withdrawList as $withdraw)
            
            <tr>
                <th>{{$withdraw->id}} </th>
                <th>{{$withdraw->fee}} </th>
                <th>{{$withdraw->amount}} </th>
                <th>{{$withdraw->date}} </th>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection

@section('script')
<script>
     var deposite_modal = $("#deposite-modal");
   $(document).ready(function() {
        $('#withdraw-table').DataTable()
    });

    function openModal(){
     
        $('#withdraw-modal').show();
    }

    function closeModal(){
        $('#withdraw-modal').hide();
    }
</script>
@endsection