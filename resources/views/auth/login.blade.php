@extends('Layout.app-layout')

@section('content')
<div class="login-container">
    <h2>Login</h2>
    <form method="post" action="actlogin">
        @csrf
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" class="form-control" id="username" placeholder="Masukkan username">

        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan password">
        </div>
        <div class="mb-3 forgot-password">
            <a href="/register">Belum punya akun ? </a>
        </div>
        <button type="submit" class="btn btn-primary btn-login">Masuk</button>
    </form>
</div>




@endsection