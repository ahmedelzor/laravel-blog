<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $articles = Article::all();
        return view('Article.index')->with("articles" , $articles);
    }


    public function create()
    {
        return view('Article.create');
    }

    
    public function store(Request $request)
    {
        // It can only be added to admins.role=1

        if ( auth()->user()-> role == 1 ){
        $request->validate([
            "title"=>'required',
            "body"=>'required|min:10',
        ]);

        $articles = new Article();
        $articles->title =$request->title;
        $articles->body =$request->body;
        $articles->user_id =auth()->user()->id;

    

    
        $articles->save();

        return redirect('Article');
        
    }
    }
   
    public function show($id)
    {
        $articles = Article::find($id);
        return view('Article.show')->with('articles' , $articles);
    }

    
    public function edit($id)
    {
        // <!--  It can only be added to admins  -->

        if ( auth()->user()-> role == 1 ){
        $articles = Article::find($id);
        return view('Article.edit')->with('articles' , $articles);
    }
    }
   
    public function update(Request $request, $id)
    {
        // <!--  It can only be added to admins  -->

        if ( auth()->user()-> role == 1 ){
        $request->validate([
            "title"=>'required',
            "body"=>'required|min:10',
        ]);

        $articles = Article::find($id);
        $articles->title =$request->title;
        $articles->body =$request->body;
        $articles->user_id =auth()->user()->id;

    

    
        $articles->save();

        return redirect('Article');
        
    }
    }
    
    public function destroy($id)  
    {
        if ( auth()->user()-> role == 1 ){
        $articles = Article::find($id);
        $articles->DELETE();
          return redirect('Articles')->with('done' , "Remove Succeessfuly");
    }
}
}
