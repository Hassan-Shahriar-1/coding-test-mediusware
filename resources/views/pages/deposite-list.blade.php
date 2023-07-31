@extends('layout.master')

@section('content')

@include('modals.add-deposite')
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

<button class="btn btn-success" onclick="openModal()">Add Deposite</button>
<table id="example" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Transection ID</th>
                <th>Fee</th>
                <th>Ammount</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($depositeList as $deposite)
            
            <tr>
                <th>{{$deposite->id}} </th>
                <th>{{$deposite->fee}} </th>
                <th>{{$deposite->ammount}} </th>
                <th>{{$deposite->date}} </th>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection

@section('script')
<script>
     var deposite_modal = $("#deposite-modal");
   $(document).ready(function() {
        $('#deposite-table').DataTable()
    });

    function openModal(){
     
        $('#deposite-modal').show();
    }

    function closeModal(){
        $('#deposite-modal').hide();
    }
</script>
@endsection