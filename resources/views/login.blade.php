@extends('master')
@section("content")

<style>
    .login_container{
        border-radius: 20px;
        margin: 5% auto;
        height: auto;
        max-width: 900px;
        overflow:hidden;
    }
    input{
        background-color: #fff;
    }

</style>

    <div class="login_container">
        <div class="row align-items-center justify-content-center" style="background-color: rgb(0, 0, 0); background-image: url('bg_1.jpg');">
            <div class="col-md-7" style="padding:20% 10%; background-color: rgb(250, 250, 250);">
                <h3>Login to <strong  style="font-family: 'Berkshire Swash'; font-size: 28px;">collabora.</strong></h3>
                <p class="mb-4">Welcome to collabora, Login in if you already have an account.</p>
                <form action="/login" method="POST">
                    @csrf
                    <div class="form-group first">
                        <label for="username">Email Address</label>
                        <input type="email" name="email" class="form-control" placeholder="your-email@gmail.com" id="username" required>
                    </div>
                    <div class="form-group last mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Your Password" id="password" required>
                    </div>
                    
                    <div class="d-flex mb-5 align-items-center">
                        <label class="control control--checkbox mb-0"><span class="caption">Remember me </span>
                        <input type="checkbox" checked="checked"/>
                        <div class="control__indicator"></div>
                        </label>
                    </div>

                    <input type="submit" class="btn btn-block btn-primary">

                </form>
            </div>
         </div>
    </div>

@endsection