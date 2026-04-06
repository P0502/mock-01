@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('content')
<div class="profile-inner">
    <h1 class="profile-heading">プロフィール設定</h1>
    <form class="profile-form" action="/profile" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="profile-image-inner">
            <img src="" class="profile-image" alt="" id="preview">
            <label for="image" class="profile-image-label">画像を選択する</label>
            <input class="profile-image-input" type="file" name="image" id="image">
            <p class="profile-image-error">
                @error('image')
                {{ $message }}
                @enderror
            </p>
        </div>
        <div class="profile-group">
            <label class="profile-name-label">ユーザー名</label>
            <input class="profile-name-input" type="text" name="name" id="name" value="{{ old('name') }}">
            <p class="profile-name-error">
                @error('name')
                {{ $message }}
                @enderror
            </p>
        </div>
        <div class="profile-group">
            <label class="profile-postcode-label">郵便番号</label>
            <input class="profile-postcode-input" type="text" name="postcode" id="postcode" value="{{ old('postcode') }}">
            <p class="profile-postcode-error">
                @error('postcode')
                {{ $message }}
                @enderror
            </p>
        </div>
        <div class="profile-group">
            <label class="profile-address-label">住所</label>
            <input class="profile-address-input" type="text" name="address" id="address" value="{{ old('address') }}">
            <p class="profile-address-error">
                @error('address')
                {{ $message }}
                @enderror
            </p>
        </div>
        <div class="profile-group">
            <label class="profile-building-label">建物名</label>
            <input class="profile-building-input" type="text" name="building" id="building" value="{{ old('buliding') }}">
        </div>
        <div class="profile-button-inner">
            <button class="profile-button" type="submit">更新する</button>
        </div>
    </form>
</div>
<script>
    document.getElementById('image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = function(e) {
            const img = document.getElementById('preview');
            img.src = e.target.result;
        };
        reader.readAsDataURL(file);
    });
</script>
@endsection