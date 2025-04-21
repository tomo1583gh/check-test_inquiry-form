@extends('layouts.app')

@section('head')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('content')
<div class="auth-wrapper">
    <h2 class="auth-title">Login</h2>

    <form method="POST" action="{{ route('login') }}" class="auth-form">
        @csrf

        <div class="form-row">
            <label for="email">メールアドレス</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus>
            @error('email') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="form-row">
            <label for="password">パスワード</label>
            <input type="password" name="password" id="password" required>
            @error('password') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="form-footer">
            <button type="submit" class="btn-submit">ログイン</button>
        </div>
    </form>
</div>
@endsection