<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = Article::all();
        return view('article.article',[
            'title' => 'List Article',
            'articles' => $article
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.addArticle');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title_article' => 'required|min:6',
            'content_article' => 'required|min:50',
        ]);

        $article = new Article();
        $article->user_id = Auth::user()->id;
        $article->title_article = $request->title_article;
        $article->content_article = $request->content_article;
        $article->save();

        return redirect()->back()->with('success', 'Data berhasil disimpan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article =  Article::find($id);

        return view('article.editArticle',[
           'title' => 'Edit Article ' . $id,
           'article' => $article
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title_article' => 'required|min:6',
            'content_article' => 'required|min:50',
        ]);

        $article = Article::find($id);
        $article->user_id = auth()->id();
        $article->title_article = $request->title_article;
        $article->content_article = $request->content_article;
        $article->save();

        return redirect('article')->with('info', 'Update article successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();

        return redirect()->back()->with('danger', 'Delete article successfully !');
    }
}
