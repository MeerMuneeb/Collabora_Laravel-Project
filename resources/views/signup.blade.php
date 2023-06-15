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
        <div class="row align-items-center justify-content-center" style="background-color: rgb(0, 0, 0); background-image: url('https://static.vecteezy.com/system/resources/previews/007/596/744/non_2x/abstract-digital-glossy-particles-and-lines-connected-3d-illustration-on-black-background-free-photo.jpg');">
            <div class="col-md-5"></div>
            <div class="col-md-7" style="padding:18% 10%; background-color: rgb(250, 250, 250); right: 0;">
                <h3>Signup to <strong  style="font-family: 'Berkshire Swash'; font-size: 28px;">collabora.</strong></h3>
                <p class="mb-4">Welcome to collabora, Signup to Become a Part of collabora.</p>
                <form action="/signup" method="POST">
                    @csrf
                    <div class="form-group first">
                        <label for="email">Email Address</label>
                        <input type="email" name="email" class="form-control" placeholder="your-email@gmail.com" id="username" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="name" class="form-control" placeholder="Your Usernme" id="uname" required>
                    </div>
                    <div class="form-group last mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Your Password" id="password" required>
                    </div>

                    <br>
                    <input type="submit" class="btn btn-block btn-primary">

                </form>
            </div>
         </div>
    </div>

@endsection