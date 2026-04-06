@extends('layouts.header')

@section('css')
<link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="register">
    <h1 class="register-heading">会員登録</h1>
    <form class="register-form" action="/register" method="post">
        @csrf
        <div class="register-group">
            <label class="register-name-label">ユーザー名</label>
            <input clas="register-name-input" type="text" name="name" id="name" value="{{ old('name') }}" style="width: 600px; height: 50px; margin-left: 150px; margin-bottom: 25px; margin-top: 10px; display: flex;">
            <p class="register-name-error">
                @error('name')
                {{ $message }}
                @enderror
            </p>
        </div>
        <div class="register-group">
            <label class="register-email-label">メールアドレス</label>
            <input class="register-email-input" type="text" name="email" id="email" value="{{ old('email') }}">
            <p class="register-email-error">
                @error('email')
                {{ $message }}
                @enderror
            </p>
        </div>
        <div class="register-group">
            <label class="register-password-label">パスワード</label>
            <input class="register-password-input" type="password" name="password" id="password">
            <p class="register-password-error">
                @error('password')
                {{ $message }}
                @enderror
            </p>
        </div>
        <div class="register-group">
            <label class="register-password_confirmation-label">確認用パスワード</label>
            <input class="register-password_confirmation-input" type="password" name="password_confirmation" id="password_confirmation">
            <p class="register-password_confirmation-error">
                @error('password_confirmation')
                {{ $message }}
                @enderror
            </p>
        </div>
        <div class="register-buttons">
            <button class="register-button-submit" type="submit">登録する</button>
            <a class="login-button-link" href="/login">ログインはこちら</a>
        </div>
    </form>
</div>
@endsection