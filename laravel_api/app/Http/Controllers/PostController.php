<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::orderByDesc("created_at")->get();

        return response()->json(
            $posts->map(function ($post) {
                return [
                    "id" => $post->id,
                    "title" => $post->title,
                    "text" => $post->text,
                    "user" => User::where('id', $post->userId)->first(),
                    "userId" => $post->userId
                ];
            })->toArray()
        );
    }

    public function create(Request $request)
    {
        $post = new Post();
        $post->userId = $request->userId;
        $post->text = $request->text;
        $post->title = $request->title;
        $post->save();

        return response()->json([
            'message' => 'Post Created Sucess',
            'code' => 200
        ]);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
