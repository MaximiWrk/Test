<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class ArticlesController extends Controller
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
        $articles = Articles::orderBy('updated_at', 'DESC')->paginate(5);
        $pages = round(count(Articles::all()) / 5);
        return view('articles.index', compact('articles'))
            ->with(['currPage' => (request()->input('page', 1) * 5), 'numPages' => $pages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('articles.create');
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

        $table = new Articles($request->all());
        $table->save();
        return redirect()->route('articles.index')
            ->with('message', "Article \"{$request->get('title')}\" created!");
    }

    /**
     * Display the specified resource.
     *
     * @param Articles $article
     * @return Application|Factory|View|Response
     */
    public function show(Articles $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Articles $article
     * @return Application|Factory|View|Response
     */
    public function edit(Articles $article)
    {
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $id
     * @param Request $request
     * @param Articles $articles
     * @return RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update($id, Request $request, Articles $articles)
    {
        $row = Articles::findOrFail($id);

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
        if (Articles::destroy($article_id)) {
            return redirect(route('articles.index'))
                ->with('message', "Article deleted!");
        }

    }
}
