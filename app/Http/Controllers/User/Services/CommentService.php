<?php

namespace App\Http\Controllers\User\Services;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddCommentRequest;
use App\Models\Comment;
use App\Models\Product;

class CommentService extends Controller
{


    public static function create(AddCommentRequest $request, $authId, Product $product)
    {

        return $product->comments()
                       ->create([
                           'user_id'   => $authId,
                           'parent_id' => null,
                           'show'      => false,
                           'text'      => $request->text
                       ]);

    }

    public static function getWithPagination(Product $product, $perPage = null)
    {
        return Comment::query()
                      ->where('product_id', $product->id)
                      ->where('show', true)
                      ->where('parent_id', null)
                      ->paginate(2);
    }
}
