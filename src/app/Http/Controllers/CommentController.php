<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    public function store(CommentRequest $request)
    {
        $validated = $request->validated();

        Comment::create([
            'user_id' => auth()->id(),
            'item_id' => $validated['item_id'],
            'comment' => $validated['comment']
        ]);

        return redirect('/item/' . $validated['item_id']);
    }
}
