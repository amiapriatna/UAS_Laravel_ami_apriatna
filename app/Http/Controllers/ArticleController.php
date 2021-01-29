<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->paginate(5);
 
        return view('articles.index', compact('articles'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
 
    public function create()
    {
        return view('articles.create');
    }
 
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|mimes:jpeg,png|max:3064',
        ]);


        date_default_timezone_set("Asia/Bangkok"); //set time jakarta/bangkok
        $filename = date('d-m-Y-H_i_s') . "_" . $request['title']; // menentukan nama file
        
        $extension = $request->image->extension(); //mengambil extensi file


        $data = [
            'title' => $request['title'],
            'content' => $request['content'],
            'image' => $filename.".".$extension,
            'creator_id' => auth()->id(), //mengambil id yang membuat artikel
        ];
 
        Article::create($data);

        // menyimpan file ke storage/app/images/articles
        $request->image->storeAs('/public/images/articles', $filename.".".$extension);
        
 
        return redirect()->route('articles.index')
                        ->with('success','Article created successfully.');
    }
 
    public function show(Article $article)
    {
        return view('articles.show',compact('article'));
    }
 
    public function edit(Article $article)
    {
        return view('articles.edit',compact('article'));
    }
 
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
 
        $data = [
            'title' => $request['title'],
            'content' => $request['content'],
        ];

        if ($request->hasFile('image')) {
            $filename = date('d-m-Y-H_i_s') . "_" . $request['title']; // menentukan nama file    
            $extension = $request->image->extension(); //mengambil extensi file
            $data['image'] = $filename.".".$extension;
            
            // apus foto
            $oldImage = $request['oldImage'];
            unlink(storage_path('app/public/images/articles/'.$oldImage));

            // simpam foto
            $request->image->storeAs('/public/images/articles', $filename.".".$extension);

        }

        $article->update($data);
 
        return redirect()->route('articles.index')
                        ->with('success','Article updated successfully');
    }
 
    public function destroy(Article $article)
    {
        $article->delete();
 
        return redirect()->route('articles.index')
                        ->with('success','Article deleted successfully');
    }

    public function user($id)
    {
        $article = Article::find($id);
        return view('show',['article' => $article]);
    }
}
