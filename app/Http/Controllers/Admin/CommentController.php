<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Services\CommentService;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddReplyRequest;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index()
    {
        $comments = CommentService::getWithPagination();
        return view('admin.comments.index', compact('comments'));
    }

    public function delete(Comment $comment)
    {
        $delete_result = CommentService::delete($comment);

        if ($delete_result) {
            return redirect()
                ->back()
                ->with('succ', config('shop.msg.delete'));
        }

        return redirect()
            ->back()
            ->with('fail', config('shop.msg.delete_fail'));

    }

    public function showComment(Comment $comment)
    {

        return view('admin.comments.singlecomment', compact('comment'));
    }

    public function addReply(AddReplyRequest $request, Comment $comment)
    {

        $reply_result = CommentService::addReply($comment, $request);

        if ($reply_result) {
            return redirect()
                ->back()
                ->with('succ', config('shop.msg.succ_reply'));
        }

        return redirect()
            ->back()
            ->with('fail', config('shop.msg.fail_reply'));

    }

    public function changeShowStatus(Comment $comment)
    {

        CommentService::changeShowStatus($comment);

        return redirect()->back();
    }
}
