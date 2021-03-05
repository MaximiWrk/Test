<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class ArticleController extends Controller
{
    /**
     *  Rules for validation.
    */
    public const VALIDATION_RULES = [
        'title' => 'required|min:3|max:255',
        'text' => 'required',
        'author' => 'required',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $articles = Article::orderBy('updated_at', 'DESC')->paginate(5);
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $categories = Category::orderBy('id')->get();
        return view('articles.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, self::VALIDATION_RULES);

        $table = new Article($request->all());
        $table->save();
        return redirect()->route('articles.index')
            ->with('message', "Article \"{$request->get('title')}\" created!");
    }

    /**
     * Display the specified resource.
     *
     * @param Article $article
     * @return Application|Factory|View|Response
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Article $article
     * @return Application|Factory|View|Response
     */
    public function edit(Article $article)
    {
        $categories = Category::orderBy('id')->get();

        return view('articles.edit', compact(['article','categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $article_id
     * @param Request $request
     * @return RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(int $article_id, Request $request)
    {

        $row = Article::findOrFail($article_id);

        $this->validate($request, self::VALIDATION_RULES);
        $row->fill($request->all())->save();

        return redirect(route('articles.index'))
            ->with('message', "Article updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $article_id
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function destroy(int $article_id)
    {
        if (Article::destroy($article_id)) {
            return redirect(route('articles.index'))
                ->with('message', "Article deleted!");
        }

    }
}
