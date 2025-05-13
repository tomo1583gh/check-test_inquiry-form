@extends('layouts.app')

@section('title', 'ユーザー登録')

@section('head')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('content')
<div class="auth-wrapper">
    <h2 class="auth-title">Register</h2>

    <form method="POST" action="{{ route('register') }}" class="auth-form">
        @csrf

        <!-- 名前 -->
        <div class="form-row">
            <label for="name">お名前</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required placeholder="例：山田太郎">
            @error('name') <div class="error-message">{{ $message }}</div> @enderror
        </div>

        <!-- メールアドレス -->
        <div class="form-row">
            <label for="email">メールアドレス</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required placeholder="例：test@example.com">
            @error('email') <div class="error-message">{{ $message }}</div> @enderror
        </div>

        <!-- パスワード -->
        <div class="form-row">
            <label for="password">パスワード</label>
            <input type="password" name="password" id="password" required placeholder="例：8文字以上の英数字">
            @error('password') <div class="error-message">{{ $message }}</div> @enderror
        </div>

        <!-- ボタン -->
        <div class="form-footer">
            <button type="submit" class="btn-submit">登録</button>
        </div>
    </form>
</div>
@endsection