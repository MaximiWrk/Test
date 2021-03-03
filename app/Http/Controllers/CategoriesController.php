<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Categories;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\ValidationException;

class CategoriesController extends Controller
{

    /**
     *  Rules for validation.
     */
    public const VALIDATION_RULES = [
        'category_name' => 'required|min:3|max:255',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $categories = Categories::orderBy('updated_at', 'DESC')->paginate(5);
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, self::VALIDATION_RULES);

        $table = new Categories($request->all());
        $table->save();
        return redirect()->route('categories.index')
            ->with('message', "Category \"{$request->get('category_name')}\" created!");
    }

    /**
     * Display the specified resource.
     *
     * @param Categories $category
     * @return Response
     */
    public function show(Categories $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Categories $category
     * @return Application|Factory|View|Response
     */
    public function edit(Categories $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $category_id
     * @param Request $request
     * @return Application|RedirectResponse|Response|Redirector
     * @throws ValidationException
     */
    public function update(int $category_id, Request $request)
    {
        $row = Categories::findOrFail($category_id);

        $this->validate($request, self::VALIDATION_RULES);
        $row->fill($request->all())->save();

        return redirect(route('categories.index'))
            ->with('message', "Category updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $category_id
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function destroy(int $category_id)
    {
        if (Categories::destroy($category_id)) {
            return redirect(route('categories.index'))
                ->with('message', "Category deleted!");
        }
    }

    public function list()
    {
        $categories = Categories::orderBy('category_id', 'ASC')->paginate(5);
        foreach ($categories as $key => $category) {
            $articles = Categories::find($category->category_id)->articles;
            $categories[$key]['articles_count'] = $articles->count();
        }
        return view('categories.list', compact('categories'));
    }

    /**
     * @param $category
     * @param Categories $categories
     * @return Application|Factory|View
     */
    public function browse($category, Categories $categories)
    {
        $articles = Categories::find($category)->articles;

        return view('categories.browse', compact('articles'));
    }
}
