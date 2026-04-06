<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\SoldItem;
use App\Models\Item;
use App\Models\Profile;
use App\Http\Requests\PurchaseRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    //購入手続き画面表示機能
    public function index($item_id)
    {
        $item = Item::findOrFail($item_id);

        $user = Auth::user();
        $profile = Profile::where('user_id', $user->id)->first();

        return view('purchase', compact('item', 'profile'));
    }
    
    //商品購入機能
    public function store(PurchaseRequest $request)
    {
        session(['purchase_data' => $request->all()]);
        session()->save();

        $itemid= $request->item_id;
        $item = Item::findOrFail($itemid);
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $session = Session::create([
            'payment_method_types' => ['card', 'konbini'],
            'payment_method_options' => [
                'konbini' => [
                    'expires_after_days' => 3,
                ],
            ],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'jpy',
                    'unit_amount' => $item->price,
                    'product_data' => [
                    'name' => $item->name,
                    ],
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('purchase.success', ['item_id' => $item->id]),
            'cancel_url' => route('purchase.index', ['item_id' => $item->id]),
        ]);

        return redirect($session->url);
    }

    public function success(Request $request)
    {
        $data = session('purchase_data');

        SoldItem::create([
            'item_id' => $request->item_id,
            'user_id' => Auth::id(),
            'payment' => $data['payment'],
            'sending_postcode' => $data['sending_postcode'],
            'sending_address' => $data['sending_address'],
            'sending_building' => $data['sending_building']
        ]);

        session()->forget('purchase_data');
        
        return redirect('/');
    }
}
