<?php

namespace App\Http\Controllers;

use App\Exports\ArticlesExport;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ArticleController extends Controller
{
    public function index(){
        $articles = Article::all();
        return view('articles.index',['articles'=>$articles]);
    }

    public function create(){
        $categories = Category::all();
        return view('articles.create',compact('categories'));
    }

    public function store(ArticleRequest $request){
        $attributes = $request->validated();
        $attributes['worker_id']=1;
        $image = $request->file('image');
        $imageExtension=$image->extension();
        $imageName=uniqid() .'.'. $imageExtension;

        $imagePath = $image->storeAs('public/ArticleImages',$imageName);
        Article::create(array_merge($attributes,['image'=>$imageName]));

        return redirect()->route('articles.index');
    }

    public function show(Article $article){

        return view('articles.show',compact('article'));
    }

    public function edit(Article $article){
        $categories = Category::all();
        return view('articles.edit',compact('categories','article'));
    }

    public function update(ArticleRequest $request, Article $article){
        $attributes = $request->validated();

        if ($request->hasFile('image')){
            $image = $request->file('image');
            $imageExtension=$image->extension();
            $imageName=uniqid() .'.'. $imageExtension;

            $imagePath = $image->storeAs('public/ArticleImages',$imageName);
            $attributes['image']=$imageName;

        }
        $article->update($attributes);

        return redirect()->route('articles.index');
    }

    public function destroy(Article $article){
        $article->delete();
        return redirect()->route('articles.index');
    }




}
