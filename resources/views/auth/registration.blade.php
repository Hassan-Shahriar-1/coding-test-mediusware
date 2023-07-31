@extends('layout.master')

@section('content')

    <h2>Register</h2>
    <form method="POST" action="/register">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="form-group">
            <label for="password">Confirm Password:</label>
            <input type="confirm_password" class="form-control" id="password" name="confirm_password">
        </div>

        <div class="form-group">
            <label for="password">Account Type:</label>
            <select name="account_type" id="account_type">
                <option value="individual" selected>Individual</option>
                <option value="buisness">Buisness</option>
            </select>
        </div>

        <div class="form-group">
            <button style="cursor:pointer" type="submit" class="btn btn-primary">Submit</button>
        </div>
    
    </form>

@endsection