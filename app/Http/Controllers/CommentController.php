<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        return Comment::all();
        
      
    }

    
    public function store(Request $request)
    {
        //
        //dd($request);
        $comment = new Comment();
        $comment['author'] = $request->author;
        $comment['content'] = $request->content;

        $post = Post::find($request->post_id);
        $post->comments()->save($comment);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
        return $comment;
    }

    
    public function update(Request $request, Comment $comment)
    {
        //
        
        //$comment['content'] = $request->content;

        //$post = Post::find($request->post_id);
        //$comment->post()->associate($post);

        //$comment->save();

        return 'Not available';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Comment $comment)
    {
        //
        if( ValidationController::userExists($request->header()['authorization'][0]) ){
            $comment->post()->dissociate();
            $comment->delete();
        }else{
            return 'Not authorized';
        }
    }
}
