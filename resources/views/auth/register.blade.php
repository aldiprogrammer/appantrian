@extends('Layout.app-layout')

@section('content')
<div class="login-container">
    <h2>Register</h2>
    <form method="post" action="/actregister">
        @csrf
         <div class="mb-3">
             <label for="username" class="form-label">No Whatsapp</label>
             <input type="number" class="form-control" id="nowa" name="nowa" placeholder="Masukkan nomor whatsapp">
            @error('nowa')
               <small class="text-danger">{{ $message }}</small>
            @enderror
            </div>

        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username">
            @error('username')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password">
            @error('password')
                 <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3 forgot-password">
            <a href="/login">Sudah punya akun ? </a>
        </div>
        <button type="submit" class="btn btn-primary btn-login">Dafatar</button>
    </form>
</div>



@endsection
