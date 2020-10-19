<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\ImportDataSiteController;

class ArticleController extends Controller
{
    private $article;
    private $totalPage = 6;

    /**
     * Display a listing of the resource.
     *     * @return \Illuminate\Http\Response
     */
    public function __construct(Article $article)
    {
        $this->middleware('auth');
        $this->article = $article;
    }

    public function getDataSite(Request $request)
    {
        $dataSite = new ImportDataSiteController();
        $dataSite->setUrl($request->url);
        //==================================//
        //=========SAVE ALL RECORDS=========//
        //==================================//
        if (count($dataSite->allItemsFound()) == 0)
            return ["msg" => 'No results found.', "success" => false];
        if ($this->storeDataSite($dataSite->allItemsFound()))
            return ["msg" => 'All items successfully captured and recorded!', "success" => true];
        return ["msg" => 'Problem registering!', "success" => false];
    }

    public function storeDataSite($data)
    {
        foreach ($data as $item) {
            $item['user_id'] = auth()->User()->id;
            try {
                $this->article->insert($item);
            } catch (\Throwable $e) {
                return false;
            }
        }
        return true;
    }

    public function index()
    {
        $articles = $this->article->paginate($this->totalPage);
        return view('articles', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'New Articles';
        return view('new-articles', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validating data
        $this->validate($request, $this->article->rules);
        try {
            $this->article->create($request->all());
            return redirect()->route('articles.create')->with('status', 'Registration successful!');
        } catch (\Throwable $e) {
            return redirect()->route('articles.create')->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *     * @param \App\Article $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return ['show' => $article];
    }

    /**
     * Show the form for editing the specified resource.
     *     * @param \App\Article $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $title = 'Edit Articles';
        return view('new-articles', compact('article', 'title'));
    }

    /**
     * Update the specified resource in storage.
     * @param \Illuminate\Http\Request $request
     * @param \App\Article $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $dataForm = $request->except(['_token', '_method']);
        try {
            $update = $article->update($dataForm);
            return redirect()->route('articles.index');
        } catch (\Throwable $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param \App\Article $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index');
    }
}
