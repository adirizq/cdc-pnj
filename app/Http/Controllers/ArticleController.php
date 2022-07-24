<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.article.index', [
            'title' => 'daftar artikel',
            'articles' =>  Article::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.article.create', [
            'title' => 'buat artikel'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|file|max:5120',
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $validatedData['image'] = $request->file('image')->store('article-images', 'public');

        Article::create($validatedData);

        return redirect(route('article.index'))->with('success', 'Berhasil mempublish artikel baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('dashboard.article.edit', [
            'title' => 'edit artikel',
            'article' => $article
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $validatedData = $request->validate([
            'image' => 'image|file|max:5120',
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        if($request->file('image')){
            Storage::delete($request->oldImage);
            $validatedData['image'] = $request->file('image')->store('article-images', 'public');
        } else {
            $validatedData['image'] = $request->oldImage;
        }

        Article::where('id', $article->id)
            ->update($validatedData);

            return redirect(route('article.index'))->with('success', 'Berhasil mengedit data artikel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        Storage::delete($article->image);
        Article::destroy($article->id);
        return back()->with('success', 'Berhasil menghapus artikel');
    }
}
