@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
<link rel="stylesheet" href="{{ asset('css/address.css') }}">
@endsection

@section('content')
<div class="edit-address">
    <h1 class="edit-address-heading">住所の変更</h1>
    <form class="edit-address-form" action="/purchase/address/{{ $item->id }}" method="post">
        @method('PATCH')
        @csrf
        <div class="edit-address-group">
            <label class="edit-address-postcode-label">郵便番号</label>
            <input class="edit-address-postcode-input" type="text" name="postcode" id="postcode" value="{{ $profile->postcode }}">
            <p class="edit-address-postcode-error">
                @error('postcode')
                {{ $message }}
                @enderror
            </p>
        </div>
        <div class="edit-address-group">
            <label class="edit-address-address-label">住所</label>
            <input class="edit-address-address-input" type="text" name="address" id="address" value="{{ $profile->address }}">
            <p class="edit-address-address-error">
                @error('address')
                {{ $message }}
                @enderror
            </p>
        </div>
        <div class="edit-address-group">
            <label class="edit-address-building-label">建物名</label>
            <input class="edit-address-building-input" type="text" name="building" id="building" value="{{ $profile->building }}">
        </div>
        <div class="update-address-button">
            <button class="update-address-button-submit" type="submit">更新する</button>
        </div>
    </form>
</div>
@endsection