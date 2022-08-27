@extends('master')
@section("content")
<div class="container login">
    <div class="row">
        <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-body">
                <form action="register" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Your Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                        
                      </div>
                    <div class="mb-3">
                      <label for="email" class="form-label">Email address</label>
                      <input type="email" class="form-control" id="email" name="email">
                      
                    </div>
                    <div class="mb-3">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                  </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
