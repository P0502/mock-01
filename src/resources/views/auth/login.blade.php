@extends('layouts.header')

@section('css')
<link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<div class="login">
    <h1 class="login-heading">ログイン</h1>
    <form class="login-form" action="/login" method="post">
        @csrf
        <div class="login-group">
            <label class="login-email-label">メールアドレス</label>
            <input class="login-email-input" type="text" name="email" id="email" value="{{ old('email') }}">
            <p class="login-email-error">
                @error('email')
                {{ $message }}
                @enderror
            </p>
        </div>
        <div class="login-group">
            <label class="login-password-label">パスワード</label>
            <input class="login-password-input" type="password" name="password" id="password">
            <p class="login-password-error">
                @error('password')
                {{ $message }}
                @enderror
            </p>
        </div>
        <div class="login-buttons">
            <button class="login-button-submit" type="submit">ログインする</button>
            <a class="register-button-link" href="/register">会員登録はこちら</a>
        </div>
    </form>
</div>
@endsection