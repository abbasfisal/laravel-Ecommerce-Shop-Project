<?php

namespace App\Http\Controllers\User\Services;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddCommentRequest;
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
}
