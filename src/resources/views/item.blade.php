@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
<link rel="stylesheet" href="{{ asset('css/item.css') }}">
@endsection

@section('content')
<div class="detail-item-container">
    <div class="detail-item-image">
        <img src="{{ asset('storage/' . $item->image) }}" alt="商品画像" class="item-image">
    </div>
    <div class="detail-item">
        <div class="detail-item-name">
            <label class="detail-item-name-label">{{ $item->name }}</label>
        </div>
        <div class="detail-item-brand">
            <label class="detail-item-brand-label">{{ $item->brand }}</label>
        </div>
        <div class="detail-item-price">
            <label class="detail-item-price-label">¥{{ number_format($item->price) }}</label>
            <span class="tax-label">(税込)</span>
            @if($item->isSold())
            <label class="sold-label">Sold</label>
            @endif
        </div>
        <div class="item-action-logos">
            <div class="item-like-logo">
                @auth
                @if ($item->likedByUsers->contains(auth()->id()))
                <form class="item-like-delete-form" action="{{ route('like.destroy', ['item_id' => $item->id]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button Class="item-like-delete-button" type="submit">
                        <img src="{{ asset('images/ハートロゴ_ピンク.png') }}" alt="like-logo" class="item-like-logo-image">
                    </button>
                </form>
                @else
                <form class="item-like-form" action="{{ route('like.store', ['item_id' => $item->id]) }}" method="post">
                    @csrf
                    <button class="item-like-button" type="submit">
                        <img src="{{ asset('images/ハートロゴ_デフォルト.png') }}" alt="like-logo" class="item-like-logo-image">
                    </button>
                </form>
                @endif
                @else
                <form class="item-like-form" action="{{ route('like.store', ['item_id' => $item->id]) }}" method="post">
                    @csrf
                    <button class="item-like-button" type="submit">
                        <img src="{{ asset('images/ハートロゴ_デフォルト.png') }}" alt="like-logo" class="item-like-logo-image">
                    </button>
                </form>
                @endauth
                <p class="item-like-count">{{ $item->likedByUsers->count() }}</p>
            </div>
            <div class="item-comment-logo">
                <img src="{{ asset('images/ふきだしロゴ.png') }}" alt="comment-logo" class="item-comment-logo-image">
                <p class="item-comment-count">{{ $item->comments->count() }}</p>
            </div>
        </div>
        <div class="item-purchase-button">
            @if ($item->soldItem)
            <button class="sold-item-button" type="button" disabled>売り切れの為、購入できません</button>
            @else
            <button class="item-purchase-button-inner" type="button" onclick="location.href='/purchase/{{ $item->id }}'">購入手続きへ</button>
            @endif
        </div>
        <div Class="detail-item-description">
            <label class="detail-item-description-label">商品説明</label>
            <span class="item-description-input">{{ $item->description }}</span>
        </div>
        <div class="detail-item-imformation">
            <label class="detail-item-imformation-label">商品の情報</label>
        </div>
        <div class="detail-item-categories">
            <label class="detail-item-categories-label">カテゴリー</label>
            <div class="item-categories-label-container">
                @foreach($item->categories as $category)
                <span class="item-categories-tag">{{ $category->category }}</span>
                @endforeach
            </div>
        </div>
        <div class="detail-item-condition">
            <label class="detail-item-condition-label">商品の状態</label>
            <span class="item-condition-tag">{{ $item->condition->condition }}</span>
        </div>
        <div class="item-comments">
            <label class="item-comments-count-label">コメント({{ $item->comments->count() }})</label>
            <ul class="item-comment-lists-grid">
                @foreach($item->comments as $comment)
                <li class="item-comment-lists">
                    <div class="item-comment-profile-inner">
                        <img src="{{ asset('storage/' . ($comment->user->profile->image ?? 'default.png')) }}" alt="" class="item-comment-profile-image">
                        <label class="item-comment-profile-name-label">{{ $comment->user->profile->name ?? '' }}</label>
                    </div>
                    <div class="item-comment-inner">
                        <label class="item-comment-text">{{ $comment->comment }}</label>
                    </div>
                </li>
                @endforeach
            </ul>
            <form class="item-comment-form" action="{{ route('comments.store', ['item_id' => $item->id]) }}" method="post">
                @csrf
                <div class="item-comment-form-inner">
                    <label class="item-comment-label">商品へのコメント</label>
                    <textarea class="item-comment-textarea" name="comment" id="comment">{{ old('comment') }}</textarea>
                    <input type="hidden" name="item_id" value="{{ $item->id }}">
                </div>
                <p class="item-comment-error">
                    @error('comment')
                    {{ $message }}
                    @enderror
                </p>
                <div class="item-comment-button">
                    <button class="item-comment-submit-button" type="submit" onclick="this.disabled=true;this.form.submit();">コメントを送信する</button>
                </div>
            </form>
        </div>
    </div>
    @endsection