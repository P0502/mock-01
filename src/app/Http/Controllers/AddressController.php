<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AddressRequest;
use App\Models\Item;

class AddressController extends Controller
{
    //住所変更機能
    public function update(AddressRequest $request, $item_id)
    {
        $profile = Auth::user()->profile;

        $profile->postcode = $request->postcode;
        $profile->address = $request->address;
        $profile->building = $request->building;

        $profile->save();

        return redirect('/purchase/' . $item_id);
    }

    //住所変更画面表示機能
    public function index($item_id)
    {
        $item = Item::findOrFail($item_id);

        $profile = Auth::user()->profile;

        return view('address', compact('item', 'profile'));
    }
}
