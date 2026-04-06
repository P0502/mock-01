@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
<link rel="stylesheet" href="{{ asset('css/sell.css') }}">
@endsection

@section('content')
<div class="sell-item">
    <h1 class="sell-item-heading">商品の出品</h1>
    <form class="sell-item-form" action="{{ route('item.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="sell-item-group">
            <label class="sell-item-image-label">商品画像</label>
            <div class="item-image-inner">
                <img class="sell-item-image" alt="" id="preview">
                <label for="image" id="sell-item-image-file-label" class=" sell-item-image-file-label">画像を選択する</label>
                <input class="sell-item-image-input" type="file" name="image" id="image">
            </div>
            <p class="sell-item-image-error">
                @error('image')
                {{ $message }}
                @enderror
            </p>
        </div>
        <h2 class="sell-item-detail">商品の詳細</h2>
        <div class="sell-item-group">
            <label class="sell-item-category-label">カテゴリー</label>
            <div class="sell-item-category-option">
                <input class="sell-item-category-input" type="checkbox" name="categories[]" id="fashion" value="1">
                <label class="sell-item-category-text" for="fashion">ファッション</label>

                <input class="sell-item-category-input" type="checkbox" name="categories[]" id="appliance" value="2">
                <label class="sell-item-category-text" for="appliance">家電</label>

                <input class="sell-item-category-input" type="checkbox" name="categories[]" id="interior" value="3">
                <label class="sell-item-category-text" for="interior">インテリア</label>

                <input class="sell-item-category-input" type="checkbox" name="categories[]" id="ladies" value="4">
                <label class="sell-item-category-text" for="ladies">レディース</label>

                <input class="sell-item-category-input" type="checkbox" name="categories[]" id="men's" value="5">
                <label class="sell-item-category-text" for="men's">メンズ</label>

                <input class="sell-item-category-input" type="checkbox" name="categories[]" id="cosmetic" value="6">
                <label class="sell-item-category-text" for="cosmetic">コスメ</label>

                <input class="sell-item-category-input" type="checkbox" name="categories[]" id="book" value="7">
                <label class="sell-item-category-text" for="book">本</label>

                <input class="sell-item-category-input" type="checkbox" name="categories[]" id="game" value="8">
                <label class="sell-item-category-text" for="game">ゲーム</label>

                <input class="sell-item-category-input" type="checkbox" name="categories[]" id="sports" value="9">
                <label class="sell-item-category-text" for="sports">スポーツ</label>

                <input class="sell-item-category-input" type="checkbox" name="categories[]" id="kitchen" value="10">
                <label class="sell-item-category-text" for="kitchen">キッチン</label>

                <input class="sell-item-category-input" type="checkbox" name="categories[]" id="handmade" value="11">
                <label class="sell-item-category-text" for="handmade">ハンドメイド</label>

                <input class="sell-item-category-input" type="checkbox" name="categories[]" id="accessory" value="12">
                <label class="sell-item-category-text" for="accessory">アクセサリー</label>

                <input class="sell-item-category-input" type="checkbox" name="categories[]" id="toy" value="13">
                <label class="sell-item-category-text" for="toy">おもちゃ</label>

                <input class="sell-item-category-input" type="checkbox" name="categories[]" id="baby-kids" value="14">
                <label class="sell-item-category-text" for="baby-kids">ベビー・キッズ</label>
            </div>
            <p class=" sell-item-categories-error">
                @error('categories')
                {{ $message }}
                @enderror
            </p>
        </div>
        <div class="sell-item-group">
            <label class="sell-item-condition-label">商品の状態</label>
            <select class="sell-item-condition-select" name="condition_id" id="condition_id">
                <option value="">選択してください</option>
                <option value="1">良好</option>
                <option value="2">目立った傷や汚れなし</option>
                <option value="3">やや傷や汚れあり</option>
                <option value="4">状態が悪い</option>
            </select>
            <p class="sell-item-condition_id-error">
                @error('condition_id')
                {{ $message }}
                @enderror
            </p>
        </div>
        <h3 class="sell-item-name-description">商品名と説明</h3>
        <div class="sell-item-group">
            <label class="sell-item-name-label">商品名</label>
            <input class="sell-item-name-input" type="text" name="name" id="name" value="{{ old('name') }}">
            <p class="sell-item-name-error">
                @error('name')
                {{ $message }}
                @enderror
            </p>
        </div>
        <div class="sell-item-group">
            <label class="sell-item-brand-label">ブランド名</label>
            <input class="sell-item-brand-input" type="text" name="brand" id="brand" value="{{ old('brand') }}">
        </div>
        <div class="sell-item-group">
            <label class="sell-item-description-label">商品の説明</label>
            <textarea class="sell-item-description-textarea" name="description" id="description">{{ old('description') }}</textarea>
            <p class="sell-item-description-error">
                @error('description')
                {{ $message }}
                @enderror
            </p>
        </div>
        <div class="sell-item-group">
            <label class="sell-item-price-label">販売価格</label>
            <div class="sell-item-price-input-wrapper">
                <label class="sell-item-price-input-wrapper-label">¥</label>
                <input class="sell-item-price-input" type="text" name="price" id="price" value="{{ old('price') }}">
            </div>
            <p class="sell-item-price-error">
                @error('price')
                {{ $message }}
                @enderror
            </p>
        </div>
        <div class="sell-item-button">
            <button class="sell-item-button-submit" type="submit">出品する</button>
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
            const button = document.getElementById('sell-item-image-file-label');
            button.style.display = 'none';
        };
        reader.readAsDataURL(file);
    });
</script>
@endsection