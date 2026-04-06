@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')
<div class="mypage-profile">
    <div class="mypage-profile-image-inner">
        <img src="{{ asset('storage/' . $profile?->image) }}" class="mypage-profile-image" alt="" id="preview">
    </div>
    <div class="mypage-profile-name-inner">
        <label class="mypage-profile-name">{{ $profile?->name }}</label>
        <button class="edit-profile-button" type="button" onclick="location.href='/mypage/profile'">プロフィールを編集</button>
    </div>
</div>
<div class=" mylist-item-tabs">
    <a href="{{ url('/mypage?page=sell') }}" class="tab-sell-my-item {{ (request('page') !== 'buy') ? 'active' : '' }}">出品した商品</a>
    <a href="{{ url('/mypage?page=buy') }}" class="tab-buy-my-item {{ request('page') === 'buy' ? 'active' : '' }}">購入した商品</a>
</div>
<ul class="item-lists-grid">
    @foreach ($items as $item)
    <li class="item-lists">
        <a href="/item/{{ $item->id }}" class="item-card-link">
            <div class="item-card">
                <div class="item-image">
                    <img src="{{ asset('storage/' . $item->image) }}" alt="商品画像" class="item-image-inner">
                </div>
                <div class="item-name">
                    <label class="item-name-label">{{ $item->name }}</label>
                    @if($item->isSold())
                    <label class="sold-label">Sold</label>
                    @endif
                </div>
            </div>
        </a>
    </li>
    @endforeach
</ul>
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