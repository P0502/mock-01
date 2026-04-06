<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Models\Condition;
use App\Models\SoldItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ExhibitionRequest;

class ItemController extends Controller
{
    //商品一覧画面表示
    public function index(Request $request)
    {
        $tab = $request->query('tab');
        $keyword = $request->query('search');

        if ($tab === 'mylist') {
            if (Auth::check()) {
                $query = Item::whereHas('likedByUsers', function($q) {
                    $q->where('users.id', Auth::id());
                    });
            } else {
                $query = Item::whereRaw('1 = 0'); }
            } else {
                $query = Item::query();
                if (Auth::check()) {
                    $query->where('user_id', '!=', Auth::id());
                }
            }

            if(!empty($keyword)) {
               $query = $query->where('items.name', 'LIKE', "%{$keyword}%");
            } 

            $items = $query->with(['user.profile', 'categories', 'condition'])
                       ->latest('items.created_at')
                       ->get();

        $categories = Category::all();
        $conditions = Condition::all();

        return view('index', compact('items', 'categories', 'conditions', 'keyword', 'tab'));
    }

    //商品出品画面表示
    public function sell()
    {
        return view('sell');
    }

    //商品出品機能
    public function store(ExhibitionRequest $request)
    {
        $item = new Item();
        $item->user_id = Auth::id();

        $item->condition_id = $request->condition_id;

        if ($request->hasFile('image')) {
            $item->image = $request->file('image')->store('items', 'public');
        }

        $item->name = $request->name;
        $item->brand = $request->brand;
        $item->description = $request->description;
        $item->price = $request->price;

        $item->save();

        $item->categories()->sync($request->categories);

        return redirect('/');
    }

    //マイページにプロフィール画像とユーザー名,出品した商品と購入した商品を表示させる機能
    public function mypage(Request $request)
    {

        $tab = $request->query('page');
        $user = Auth::user();

        $query = Item::query();

        $profile = $user?->profile;

        $categories = Category::all();
        $conditions = Condition::all();

        if ($tab === 'buy') {
            if ($user) {
                $items = SoldItem::where('user_id', $user->id)
                ->with('item')->latest()->get()->pluck('item');
        } else {
            $items = collect();
        }
        } else {
            $items = $user
            ? Item::where('user_id', $user->id)->with(['user.profile', 'condition', 'categories'])->latest()->get()
            : collect();
        }

        return view('mypage', compact('items', 'conditions', 'categories', 'profile'));
    }

    //商品検索機能
    public function search(Request $request)
    {
        $keyword = $request->query('search');
        $tab = $request->query('tab');

        if (!$request->filled('search')) {
            $tab = $request->query('tab');

            if($tab === 'mylist') {
                return redirect('/?tab=mylist');
            }

            return redirect('/');
        }

        if ($tab === 'mylist') {
            if (Auth::check()) {
                $query = Item::whereHas('likedByUsers', function($q) {
                    $q->where('users.id', Auth::id());
                    });
            } else {
                $query = Item::whereRaw('1 = 0'); }
            } else {
                $query = Item::query();
                
                if (Auth::check()) {
                    $query->where('user_id', '!=', Auth::id());
                }
            
            if(!empty($keyword)) {
               $query = $query->where('items.name', 'LIKE', "%{$keyword}%");
            }
        }

        $items = $query->with(['user.profile', 'categories', 'condition'])
                       ->latest('items.created_at')
                       ->get();

        $categories = Category::all();
        $conditions = Condition::all();

        return view('index', compact('items', 'categories', 'conditions', 'tab', 'keyword'));
    }

    //商品詳細画面表示
    public function detail($id)
    {
        $item = Item::with([
            'user.profile', 
            'condition', 
            'categories',
            'comments.user.profile', 
            'comments' => function($query) { 
                $query->latest(); 
            },
        ])->findOrFail($id);

        $categories = Category::all();
        $conditions = Condition::all();

        $user = Auth::user();
        $profile = $user ? $user->profile : null;

        return view('item', compact('item', 'conditions', 'categories', 'profile'));
    }
}
