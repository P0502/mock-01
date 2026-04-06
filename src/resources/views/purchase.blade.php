@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
<link rel="stylesheet" href="{{ asset('css/purchase.css') }}">
@endsection

@section('content')
<div class="purchase-item-container">
    <div class="purchase-item">
        <div class="purchase-item-image">
            <img src="{{ asset('storage/' . $item->image) }}" alt="商品画像" class="purchase-item-image-inner">
        </div>
        <div class="purchase-item-labels">
            <label class="purchase-item-name">{{ $item->name }}</label>
            <label class="purchase-item-price">¥{{ number_format($item->price) }}</label>
        </div>
    </div>
    <div class="purchase-item-payment">
        <label class="purchase-item-payment-label">支払い方法</label>
        <select class="purchase-item-payment-select" form="purchase-item-form" name="payment" id="payment-select">
            <option value="">選択してください</option>
            <option value="コンビニ払い">コンビニ払い</option>
            <option value="カード支払い">カード支払い</option>
        </select>
        <p class="purchase-item-payment-error">
            @error('payment')
            {{ $message }}
            @enderror
        </p>
    </div>
    <div class="purchase-item-send-address">
        <div class="edit-address">
            <label class="purchase-item-send-address-label">配送先</label>
            <a class="edit-address-link" href="/purchase/address/{{ $item->id }}">変更する</a>
        </div>
        <div class="purchase-item-send-address-labels">
            <label class="send-postcode-label">〒{{ $profile->postcode }}</label>
            <label class="send-address-label">{{ $profile->address }}</label>
            <label class="send-building-label">{{ $profile->building }}</label>
        </div>
    </div>
</div>
<div class="purchase-item-table-container">
    <div class="purchase-item-table">
        <table class=" purchase-item-table-inner">
            <tr class="purchase-item-price-table-row">
                <th class="purchase-item-price-table-header">商品代金</th>
                <td class="purchase-item-price-table-input">¥{{ number_format($item->price) }}</td>
            </tr>
            <tr class="purchase-item-payment-table-row">
                <th class="purchase-item-payment-table-header">支払い方法</th>
                <td class="purchase-item-payment-table-input" id="selected-payment"></td>
            </tr>
        </table>
    </div>
    <form id="purchase-item-form" action="/purchase/{{ $item->id }}" method="post">
        @csrf
        <input type="hidden" name="sending_postcode" id="sending_postcode" value="{{ $profile->postcode }}">
        <input type="hidden" name="sending_address" id="sending_address" value="{{ $profile->address }}">
        <input type="hidden" name="sending_building" id="sending_building" value="{{ $profile->building }}">
        <input type="hidden" name="payment" id="payment">
        <div class="purchase-item-button">
            <button class="purchase-item-button-submit" type="submit">購入する</button>
        </div>
    </form>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const paymentSelect = document.getElementById('payment-select');
        const selectPaymentDisplay = document.getElementById('selected-payment');
        const paymentHiddenInput = document.getElementById('payment');

        paymentSelect.addEventListener('change', function() {
            selectPaymentDisplay.textContent = this.value;
            paymentHiddenInput.value = this.value;
        });

        if (paymentSelect.value) {
            selectPaymentDisplay.textContent = paymentSelect.value;
        }
    });
</script>
@endsection