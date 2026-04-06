@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="item-tabs">
    <a href="{{ url('/?search=' . $keyword) }}" class="tab-item {{  (is_null(request('tab')) || request('tab') === 'recommend') ? 'active' : '' }}">おすすめ</a>
    <a href="{{ url('/?tab=mylist&search=' . $keyword) }}" class="tab-item-mylist {{ request('tab') ===  'mylist' ? 'active' : '' }}">マイリスト</a>
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
@endsection