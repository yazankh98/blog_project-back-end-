@extends('layouts.app')
@section('title', 'login')
@section('content')

    <div class="loginContainer">
        <div class="login">
            <form action="/login" method="POST">
                @csrf
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <input class="input form-control" type="email" name="email" id="email" placeholder=" Enter Your Email">
                        
                        <input class="input form-control" type="password" name="password" id="password" placeholder=" Enter Your password">

                        <input class="btn btn-primary btn-login" type="submit" name="" id="" value="LogIn">
                        <hr>
                        <a href="/register" class="btn  createNewAcc">Create new account</a>
                    </div>
                </div>
                
            </form>

        </div>

    </div>

@endsection
