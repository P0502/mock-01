<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileRequest;
use App\Models\Profile;

class ProfileController extends Controller
{

    // プロフィール初期登録画面の表示
    public function index ()
    {
        return view('profile');
    }

    // プロフィール初期登録の保存
    public function store(ProfileRequest $request)
    {
        $profile = Auth::user()->profile ?? new Profile();
        $profile->user_id = Auth::id();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('profile', 'public');
            $profile->image = $path;
        }

        $profile->name = $request->name;
        $profile->postcode = $request->postcode;
        $profile->address = $request->address;
        $profile->building = $request->building;

        $profile->save();

        return redirect('/');
    }

    // プロフィール編集画面の表示
    public function edit()
    {
        $profile = Auth::user()->profile;
        return view('edit', compact('profile'));
    }

    // プロフィール編集の保存
    public function update(ProfileRequest $request)
    {
        $profile = Auth::user()->profile;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('profile', 'public');
            $profile->image = $path;
        }

        $profile->name = $request->name;
        $profile->postcode = $request->postcode;
        $profile->address = $request->address;
        $profile->building = $request->building;

        $profile->save();

        return redirect('/mypage');
    }
}
