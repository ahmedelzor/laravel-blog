<?php

namespace App\Http\Controllers;

use App\Comments;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    
    public function index()
    {  
        $comment = Comments::all();
        return view('Comment.addcomment')->with("comment" , $comment);
    }
    
    public function store(Request $request)
    {
        //  <!-- Comments can only be written by users -->

        if ( auth()->user()-> role == 0 ){

        $request->validate([
            'comment'=>'min:4',
        ]);
        $comment = new Comments();
        $comment->comment=$request->comment;
        $comment->article_id = $request->article_id;


        $comment->save();
        return redirect()->back()->with('done' , "Add Succeessfuly");

    }      
    
}

    public function destroy($id)
    {
        $comment = Comments::find($id);
        $comment->DELETE();
        return redirect()->back()->with('done' , "Remove Succeessfuly");
    }
    
    
    
}
