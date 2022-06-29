<?php

namespace App\Http\Controllers\Admin\Services;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddReplyRequest;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentService extends Controller
{
    public static function getWithPagination($perPage = null)
    {
        return Comment::query()
                      ->where('parent_id', null)
                      ->latest()
                      ->paginate($perPage ?? config('shop.perPage'));

    }

    public static function delete(Comment $comment)
    {
        return $comment->delete();

    }

    public static function addReply(Comment $comment, AddReplyRequest $request)
    {
        $comment->update(['show' => true]);

        return $comment->reply()
                       ->create([
                           'product_id' => $comment->product_id,
                           'text'       => $request->reply,
                           'user_id'    => Auth::id(),
                           'parent_id'  => $comment->id,
                           'show'       => true,

                       ]);
    }

    public static function changeShowStatus(Comment $comment)
    {
        $show_status = $comment->show;
        return $comment->update([
            'show' => $show_status ? false : true,
        ]);
    }
}
