@extends('layout.master')

@section('content')


<div>
    <h5 class="text-center"> Deposite list</h5>
</div>
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
   $(document).ready(function() {
        $('#deposite-table').DataTable()
    });
</script>
@endsection