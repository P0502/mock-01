@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
<link rel="stylesheet" href="{{ asset('css/edit.css') }}">
@endsection

@section('content')
<div class="edit-profile">
    <h1 class="edit-profile-heading">プロフィール設定</h1>
    <form class="edit-profile-form" action="/mypage/profile" method="post" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="edit-profile-image">
            <img src="{{ asset('storage/' . $profile->image) }}" class="profile-image" id="preview">
            <label for="image" class="edit-profile-image-label">画像を選択する</label>
            <input class="edit-profile-image-input" type="file" name="image" id="image">
            <p class="edit-profile-image-error">
                @error('image')
                {{ $message }}
                @enderror
            </p>
        </div>
        <div class="edit-profile-group">
            <label class="edit-profile-name-label">ユーザー名</label>
            <input class="edit-profile-name-input" type="text" name="name" id="name" value="{{ $profile->name }}">
            <p class="edit-profile-name-error">
                @error('name')
                {{ $message }}
                @enderror
            </p>
        </div>
        <div class="edit-profile-group">
            <label class="edit-profile-postcode-label">郵便番号</label>
            <input class="edit-profile-postcode-input" type="text" name="postcode" id="postcode" value="{{ $profile->postcode }}">
            <p class="edit-profile-postcode-error">
                @error('postcode')
                {{ $message }}
                @enderror
            </p>
        </div>
        <div class="edit-profile-group">
            <label class="edit-profile-address-label">住所</label>
            <input class="edit-profile-address-input" type="text" name="address" id="address" value="{{ $profile->address }}">
            <p class="edit-profile-address-error">
                @error('address')
                {{ $message }}
                @enderror
            </p>
        </div>
        <div class="edit-profile-group">
            <label class="edit-profile-building-label">建物名</label>
            <input class="edit-profile-building-input" type="text" name="building" id="building" value="{{ $profile->building }}">
        </div>
        <div class="update-profile-button">
            <button class="update-profile-button-submit" type="submit">更新する</button>
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