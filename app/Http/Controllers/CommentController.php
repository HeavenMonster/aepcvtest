<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\BlockedEmail;
use Illuminate\Validation\ValidationException;

/**
 * Class CommentController
 *
 * @package App\Http\Controllers
 */
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($postId)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $postId)
    {
        $post = Post::findOrFail($postId);

        $this->validate($request, [
            'email'     => 'required|email|not_in_blocked_emails_list',
            'comment'   => 'required'
        ]);

        $comment = new Comment;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $post->comments()->save($comment);

        return redirect()->action('PostController@show', $post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Delete all user comments and add his email to blacklist
     *
     * @param $postId
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function block($postId, Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email'
        ]);

        Comment::where('email', $request->email)->delete();

        $blockedEmail = new BlockedEmail();
        $blockedEmail->email = $request->email;
        $blockedEmail->save();

        $post = Post::findOrFail($postId);

        return redirect()->action('PostController@show', $post);
    }
}
