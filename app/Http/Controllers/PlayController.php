<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

class PlayController extends Controller
{
    function index()
    {
        DB::enableQueryLog();

        $user = User::whereLike('name','%taylor%')->get();

        $posts = Post::with('user:id,name')->with('comments');

        if (count($user)) {
            $posts->whereBelongsTo($user);
        }

        $posts = $posts->get();

        return view('play',compact('posts'));
    }

    function createPost()
    {
        DB::enableQueryLog();

        $user = User::find(1);
        $user->posts()->create([
            'title' => 'The Title',
            'body' => 'The body with long text',
        ]);

        $newUser = User::create([
            'name' => 'Taylor',
            'email' => 'taylor@laravel.com',
            'password' => bcrypt('password'),
        ]);

        $newUser->posts()->createMany([
            [
                'title' => 'The Second Title',
                'body' => 'The second body with long text',
            ],
            [
                'title' => 'The Third Title',
                'body' => 'The third body with long text',
            ],
        ]);

        $query = DB::getQueryLog();
        dump($query);

        echo '<p style="margin-top:20px;"><a href="/play/index">Back</a></p>';
    }

    function createComment(Request $request)
    {
        DB::enableQueryLog();

        $post = Post::find($request->id ?? '');
        $post->comments()->create([
            'text' => fake()->realText(10),
            'user_id' => '1',
        ]);

        $query = DB::getQueryLog();
        dump($query);

        echo '<p style="margin-top:20px;"><a href="/play/index">Back</a></p>';
    }

    function clearPost()
    {
        DB::enableQueryLog();

        User::where('name','Taylor')->delete();
        Post::truncate();
        Comment::truncate();

        dump(DB::getQueryLog());

        echo '<p style="margin-top:20px;"><a href="/play/index">Back</a></p>';
    }

    function deletePost(Request $request)
    {
        DB::enableQueryLog();

        $post = Post::find($request->id ?? '');
        $post->comments()->delete();
        $post->delete();

        dump(DB::getQueryLog());

        echo '<p style="margin-top:20px;"><a href="/play/index">Back</a></p>';
    }
}
